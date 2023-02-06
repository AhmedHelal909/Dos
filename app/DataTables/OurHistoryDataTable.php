<?php

namespace App\DataTables;

use App\Models\OurHistory;
use App\Models\OurTeam;
use App\Models\Pharmacy;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OurHistoryDataTable extends DataTable
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
            ->editColumn('content', function ($query) {
                return strip_tags($query->content);
            })
           ->addIndexColumn()
            ->addColumn('action', function ($query) {
                $row = $query;
                $module_name_singular = 'ourhistory';
                $module_name_plural   = 'ourhistories';
//                $edit = '<a href="' . route('dashboard.pharmacies.edit', $query->id) . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                return view('dashboard.includes.buttons.edit', compact('module_name_singular', 'module_name_plural', 'row'))
                    . view('dashboard.includes.buttons.delete', compact('module_name_singular', 'module_name_plural', 'row'));
//                return $edit . ' ' . $delete;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OurHistory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OurHistory $model)
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
            ->setTableId('ourteam-table')
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
            Column::make('content')->addClass('text-center')->title(__('site.content')),
            Column::make('date')->addClass('text-center')->title(__('site.date')),
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
