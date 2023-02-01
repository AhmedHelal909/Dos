<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\PharmacyDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\PharmacyRequest;
use App\Models\Pharmacy;

class PharmacyController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(Pharmacy $model, PharmacyDataTable $pharmacyDataTable)
    {
        parent::__construct($model, $pharmacyDataTable);
    }

    public function store(PharmacyRequest $request)
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

    public function update(PharmacyRequest $request, Pharmacy $pharmacy)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        $this->deleteImagesDynamic($pharmacy, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $pharmacy->syncRoles($request->roles);
        }

        $pharmacy->update($request_data);
        // $user->syncRoles($request->role_id);

        return $this->redirectTo('update',$pharmacy->id);
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
