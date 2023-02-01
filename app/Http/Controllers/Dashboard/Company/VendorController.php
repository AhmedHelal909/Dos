<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\VendorDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\VendorRequest;
use App\Models\Pharmacy;

class VendorController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(Pharmacy $model, VendorDateTable $vendorDataTable)
    {
        parent::__construct($model, $vendorDataTable);
    }

    public function store(VendorRequest $request)
    {
        $request_data = $request->except(array_merge($this->uploadImages, ['_token','password_confirmation', 'roles','password']));
        $request_data['password'] = bcrypt($request->password);
        $request_data += $this->uploadImagesDynamic($request);
        $newVendor = $this->model->create($request_data);
        if ($request->roles) {
            $newVendor->assignRole($request->roles);
        }
        return $this->redirectTo('store',$newVendor->id);
    }
    public function edit($id)
    {
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        $append = $this->append();

        $row = $this->model->with('active')->find($id);
        // return $row;
        return view(static::VIEW .'.'. $this->getClassNameFromModel() . '.edit', compact('row', 'module_name_singular', 'module_name_plural'))->with($this->append());
    } //end of edit
    public function update(VendorRequest $request, Pharmacy $vendor)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token','password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }
        $this->deleteImagesDynamic($vendor, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $vendor->syncRoles($request->roles);
        }
        $vendor->update($request_data);
     return $this->redirectTo('update',$vendor->id);
    }


    protected function append()
    {
        return [
        ];

    }

}
