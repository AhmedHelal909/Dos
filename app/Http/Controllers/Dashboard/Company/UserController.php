<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(User $model, UserDataTable $userDataTable)
    {
        parent::__construct($model, $userDataTable);
    }

    public function store(UserRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        $request_data['password'] = bcrypt($request->password);

        $request_data += $this->uploadImagesDynamic($request);
        $newuser = $this->model->create($request_data);
        if ($request->roles) {
            $newuser->assignRole($request->roles);
        }
       return $this->redirectTo('store',$newuser->id);
    
    }

    public function update(UserRequest $request, User $user)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }


        $this->deleteImagesDynamic($user, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        $user->update($request_data);
        // $user->syncRoles($request->role_id);

     return $this->redirectTo('update',$user->id);
    }

    protected function append()
    {
          return [

          ];
    }
    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $this->deleteImagesDynamic($row, $row);
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    } //end of destroy function
}
