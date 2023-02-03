<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\SettingDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends BaseDatatableController
{

    public function __construct(Setting $model, SettingDateTable $settingDateTable)
    {
        parent::__construct($model, $settingDateTable);
    }

    public function update(SettingRequest $request, Setting $setting)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $setting->update($request_data);
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    }

}
