<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\ContactUsDateTable;
use App\DataTables\SettingDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\SettingRequest;
use App\Models\Contact;
use App\Models\Setting;

class ContactUController extends BaseDatatableController
{

    public function __construct(Contact $model, ContactUsDateTable $contactUsDateTable)
    {
        parent::__construct($model, $contactUsDateTable);
    }

    public function update(ContactUsRequest $request, Contact $contact)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $contact->update($request_data);
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    }

}
