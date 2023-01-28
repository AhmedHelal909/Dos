<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
           ->addIndexColumn()
            ->addColumn('action', function ($query) {
                $row = $query;
                $module_name_singular = 'user';
                $module_name_plural   = 'users';
                return view('dashboard.includes.buttons.edit', compact('module_name_singular', 'module_name_plural', 'row'))  . view('dashboard.includes.buttons.show', compact('module_name_singular', 'module_name_plural', 'row'))
                
                . view('dashboard.includes.buttons.read_branch', compact('module_name_singular', 'module_name_plural', 'row'));
            
            
            })
;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('user-table')
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
            Column::make('name')->addClass('text-center')->title(__('site.name')),
            Column::make('email')->addClass('text-center')->title(__('site.email')),
            Column::make('created_at')->addClass('text-center')->title(__('site.created_at')),
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
