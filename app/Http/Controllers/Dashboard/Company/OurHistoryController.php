<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\OurHistoryDataTable;
use App\DataTables\OurTeamDataTable;
use App\DataTables\PharmacyDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\OurHistoryRequest;
use App\Http\Requests\OurTeamRequest;
use App\Http\Requests\PharmacyRequest;
use App\Models\OurHistory;
use App\Models\OurTeam;
use App\Models\Pharmacy;

class OurHistoryController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(OurHistory $model, OurHistoryDataTable $ourHistoryDataTable)
    {
        parent::__construct($model, $ourHistoryDataTable);
    }

    public function store(OurHistoryRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));

        $request_data += $this->uploadImagesDynamic($request);
        $newuser = $this->model->create($request_data);
        if ($request->roles) {
            $newuser->assignRole($request->roles);
        }
        return $this->redirectTo('store',$newuser->id);

    }

    public function update(OurHistoryRequest $request, OurHistory $ourHistory)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        $this->deleteImagesDynamic($ourHistory, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $ourHistory->syncRoles($request->roles);
        }

        $ourHistory->update($request_data);
        // $user->syncRoles($request->role_id);

        return $this->redirectTo('update',$ourHistory->id);
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
