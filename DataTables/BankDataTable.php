<?php

namespace Modules\Bank\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Bank\Entities\Bank;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BankDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('signature', fn ($model) => '<img src="'.asset($model->signature).'" height="20">')
            ->editColumn('created_at', fn ($model) => format_date($model->created_at))
            ->addColumn('action', 'bank::action')
            ->setRowId('id')
            ->rawColumns(['signature', 'action']);
    }

    public function query(Bank $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-datatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom(config('custom.table.dom'))
            ->orderBy(1)
            ->stateSave()
            ->autoWidth()
            ->responsive()
            ->addTableClass(config('custom.table.class'))
            ->parameters([
                'scrollY' => true,
            ]);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('id')
                ->data('DT_RowIndex')
                ->printable(false)
                ->exportable(false)
                ->orderable(false)
                ->title('#'),
            Column::make('name')->title(__('Bank Name')),
            Column::make('account_name')->title(__('Account Name')),
            Column::make('account_number')->title(__('Account Number')),
            Column::make('branch')->title(__('Branch')),
            Column::make('routing_number')->title(__('Routing Number')),
            Column::make('signature')->title(__('Signature')),
            Column::make('created_at')->title(__('Created At')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Action'),
        ];
    }

    protected function filename(): string
    {
        return 'Banks_'.date('YmdHis');
    }
}
