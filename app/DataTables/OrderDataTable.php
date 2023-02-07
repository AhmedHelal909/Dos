<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return $query->created_at;
            })->editColumn('customer_id', function ($query) {
                return $query->customer->name ?? '-';
            })
            ->editColumn('pahrmacy_ids', function ($query) {
                $pharmacy_ids = Pharmacy::find($query->pharmacy_ids)->pluck('name')->implode(',');
                return $pharmacy_ids ?? '-';
            })
//            ->editColumn('image', function ($query) {
//                return "<img src=".$query->image_path." width='50' height='50'>";
//            })
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                $row = $query;
                $pharmacies = Pharmacy::get();
                $module_name_singular = 'order';
                $module_name_plural = 'orders';
                return view('dashboard.company.orders.model',compact('module_name_singular', 'module_name_plural', 'row', 'pharmacies'));
//                 view('dashboard.includes.buttons.edit', compact('module_name_singular', 'module_name_plural', 'row'));
//                    . view('dashboard.includes.buttons.show', compact('module_name_singular', 'module_name_plural', 'row'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->language(['url' => asset('assets/datatable-lang/' . app()->getLocale() . '.json')])
            ->buttons(
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->addClass('text-center')->orderable(false)->searchable(false)->title(__('site.id')),
            Column::make('name')->title(__('site.name')),
            Column::make('phone')->title(__('site.phone')),
            Column::make('address')->title(__('site.address')),
            Column::make('medical_number')->title(__('site.medical_number')),
            Column::make('id_number')->title(__('site.id_number')),
            Column::make('pahrmacy_ids')->title(__('site.pharmacies')),
            Column::make('customer_id')->title(__('site.customer_id')),
            Column::make('status')->title(__('site.status')),
            Column::make('created_at')->title(__('site.created_at')),
            Column::make('action')->addClass('text-center')->orderable(false)->searchable(false)->title(__('site.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return 'User_' . date('YmdHis');
    // }
}
