<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\ImageDateTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends BaseDatatableController
{
    protected $uploadImages = ['image'];
    public function __construct(Image $model, ImageDateTable $imageDateTable)
    {
        parent::__construct($model, $imageDateTable);
    }

    public function update(Request $request, Image $image)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token']));
        $this->deleteImagesDynamic($image, $request);
        $request_data += $this->uploadImagesDynamic($request);

        $image->update($request_data);
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    }

}
