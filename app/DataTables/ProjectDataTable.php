<?php

namespace App\DataTables;

use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
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
                    return convert_date($model->created_at);
                })
                ->addColumn('action', function($model) {
                    $status = ($model->status == true) ? 'fa-unlock' : 'fa-lock';
                    return '
                        <button data-url="'.route('admin.projects.status').'"
                                data-id="'.$model->id.'"
                                data-status="'.$model->status.'"
                                class="btn btn-status btn-sm btn-primary">
                            <i class="fa '.$status.'"></i>
                        </button>
                        <button class="btn btn-sm btn-info">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="'.route('admin.projects.edit', $model->id).'" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit" style="color:white;"></i>
                        </a>
                        <button data-url="'.route('admin.projects.destroy', $model->id).'"
                                class="btn btn-delete btn-sm btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
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
                    ->setTableId('project-table')
                    ->addClass('table table-hover table-bordered')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('create'),
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
            Column::make('title'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
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
        return 'Project_' . date('YmdHis');
    }
}
