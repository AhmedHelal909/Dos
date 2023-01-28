<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\DeliveryDataTable;
use App\Enum\StatusEnum;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;

class DeliveryController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(Delivery $model, DeliveryDataTable $deliveryDataTable)
    {
        parent::__construct($model, $deliveryDataTable);
    }

    public function store(DeliveryRequest $request)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token','password', 'password_confirmation']));
        $request_data['password'] = bcrypt($request->password);
        $request_data += $this->uploadImagesDynamic($request);
        $newGift = $this->model->create($request_data);
        $newGift->assignRole([3]);
        return $this->redirectTo('store',$newGift->id);
    }

    public function update(DeliveryRequest $request, Delivery $delivery)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token','password', 'password_confirmation']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }
        $this->deleteImagesDynamic($delivery, $request);
        $request_data += $this->uploadImagesDynamic($request);
        $delivery->update($request_data);
     return $this->redirectTo('update',$delivery->id);
    }

 
    protected function append()
    {
        $data =  [
            'status' => StatusEnum::getList(),
        ];
        
       return  array_merge($data,parent::append() );
    }

}
