<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\OurTeamDataTable;
use App\DataTables\PharmacyDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\OurTeamRequest;
use App\Http\Requests\PharmacyRequest;
use App\Models\OurTeam;
use App\Models\Pharmacy;

class OurTeamController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(OurTeam $model, OurTeamDataTable $ourteamDataTable)
    {
        parent::__construct($model, $ourteamDataTable);
    }

    public function store(OurTeamRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));

        $en =$this->uploadImageSlider($request->image['ar'],'ourteams');
        $ar =$this->uploadImageSlider($request->image['en'],'ourteams');
        $request_data['image']= [
            'en'=> $en,
            'ar'=> $ar,
        ];
        $newuser = $this->model->create($request_data);
        if ($request->roles) {
            $newuser->assignRole($request->roles);
        }
        return $this->redirectTo('store',$newuser->id);

    }

    public function update(OurTeamRequest $request, OurTeam $ourteam)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->image != null){
        $this->deleteImagesDynamic($ourteam, $request);
        $en =$this->uploadImageSlider($request->image['ar'],'ourteams');
        $ar =$this->uploadImageSlider($request->image['en'],'ourteams');
        $request_data['image']= [
            'en'=> $en,
            'ar'=> $ar,
        ];
        }
        if ($request->roles) {
            $ourteam->syncRoles($request->roles);
        }

        $ourteam->update($request_data);
        // $user->syncRoles($request->role_id);

        return $this->redirectTo('update',$ourteam->id);
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
