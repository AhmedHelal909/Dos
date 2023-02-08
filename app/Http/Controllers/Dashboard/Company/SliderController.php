<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;

class SliderController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(Slider $model, SliderDataTable $sliderDataTable)
    {
        parent::__construct($model, $sliderDataTable);
    }

    public function store(SliderRequest $request)
    {

//        dd($request->image['en']);
        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
         $en =$this->uploadImageSlider($request->image['ar'],'sliders');
         $ar =$this->uploadImageSlider($request->image['en'],'sliders');
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

    public function update(SliderRequest $request, Slider $slider)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->image != null){
        $this->deleteImagesDynamic($slider, $request);
        $en =$this->uploadImageSlider($request->image['ar'],'sliders');
        $ar =$this->uploadImageSlider($request->image['en'],'sliders');
        $request_data['image']= [
            'en'=> $en,
            'ar'=> $ar,
        ];
        }

        if ($request->roles) {
            $slider->syncRoles($request->roles);
        }

        $slider->update($request_data);
        // $user->syncRoles($request->role_id);

        return $this->redirectTo('update',$slider->id);
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
