<?php

namespace App\DataTables;

use App\Models\Subscriber;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubscriberDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query)
                ->addIndexColumn()
                ->editColumn('created_at', function($model) {
                    return date('d F Y H:i', strtotime($model->created_at));
                })
                ->editColumn('status', function($model) {
                    return ($model->status == 1)
                            ?'<span class="badge badge-info">Active</span>'
                            :'<span class="badge badge-warning">In active</span>';
                })
                ->addColumn('action', function($model) {
                    return '
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Subscriber $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscriber $model)
    {
        $query = $model->newQuery();
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('subscriber-table')
                    ->addTableClass('table table-hover table-bordered')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
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
            Column::computed('No')
                    ->defaultContent('')
                    ->data('DT_RowIndex')
                    ->name('DT_RowIndex')
                    ->title('No')
                    ->render(null)
                    ->orderable(false)
                    ->searchable(false)
                    ->footer(''),
            Column::make('email'),
            Column::make('status')
                  ->addClass('text-center'),
            Column::make('created_at')
                  ->title('Subscribe At'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subscriber_' . date('YmdHis');
    }
}
