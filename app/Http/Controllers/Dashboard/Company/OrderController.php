<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\DataTables\OrderDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Dashboard\BaseDatatableController;
use App\Http\Requests\UserRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends BaseDatatableController
{

    protected $uploadImages = ['image'];

    public function __construct(Order $model, OrderDataTable $orderDataTable)
    {
        parent::__construct($model, $orderDataTable);
    }

//    public function store(Request $request)
//    {
//        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
//        $request_data['password'] = bcrypt($request->password);
//
//        $request_data += $this->uploadImagesDynamic($request);
//        $newuser = $this->model->create($request_data);
//        if ($request->roles) {
//            $newuser->assignRole($request->roles);
//        }
//       return $this->redirectTo('store',$newuser->id);
//
//    }

    public function update(Request $request, Order $order)
    {

        $request_data = $request->except(array_merge($this->uploadImages, ['_token', 'password', 'password_confirmation', 'roles']));
        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);
        }


        $this->deleteImagesDynamic($order, $request);
        $request_data += $this->uploadImagesDynamic($request);

        if ($request->roles) {
            $order->syncRoles($request->roles);
        }

        $order->update($request_data);
        // $order->syncRoles($request->role_id);

     return $this->redirectTo('update',$order->id);
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

    public function assign(Request $request)
    {

        $request->validate([
            'pharmacy_id' => 'required|exists:pharmacies,id'
        ]);
        $row = $this->model->findOrFail($request->order_id);
//        if (!$row){
//            session()->flash('error', __('site.not_found'));
//            return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
//        }

        $row->status = 2;
        $row->pharmacy_ids = $request->pharmacy_id;
        $row->save();
        session()->flash('success', __('site.assigned_successfully'));
        return redirect()->route('dashboard.' . $this->getClassNameFromModel() . '.index');
    }
}
