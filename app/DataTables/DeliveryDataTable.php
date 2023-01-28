<?php

namespace App\DataTables;

use App\Models\Models\Delivery;
use App\Models\Models\Gift;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DeliveryDataTable extends DataTable
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
            })
            ->editColumn('image', function (Delivery $zone) {
                return "<img src=".$zone->image_path." width='50' height='50' />";
             })
           ->addIndexColumn()
            ->addColumn('action', function ($query) {
                $row = $query;
                $module_name_singular = 'delivery';
                $module_name_plural   = 'deliveries';
                return view('dashboard.includes.buttons.edit', compact('module_name_singular', 'module_name_plural', 'row'))  . view('dashboard.includes.buttons.show', compact('module_name_singular', 'module_name_plural', 'row'));     
                   })
                 ->rawColumns(['image','action']);
    }

    public function query(Delivery $model)
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
            ->setTableId('delivery-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->language(['url'=>asset('assets/datatable-lang/' . app()->getLocale() . '.json')])
            ->buttons(
                Button::make('create'),
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
            Column::make('ssn')->addClass('text-center')->title(__('site.ssn')),
            Column::make('motor_number')->addClass('text-center')->title(__('site.motor_number')),
            Column::make('license')->addClass('text-center')->title(__('site.license')),
            Column::make('image')->addClass('text-center')->title(__('site.image')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                // ->width(60)
                ->addClass('text-center')->title(__('site.action')),
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
