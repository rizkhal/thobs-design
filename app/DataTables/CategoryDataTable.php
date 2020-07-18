<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    private $query;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable()
    {
        return datatables()->eloquent($this->query)
            ->addIndexColumn()
            ->editColumn('description', function($model) {
                if (is_null($model->description)) {
                    return '<span class="label label-info">empty</span>';
                }

                return $model->description;
            })
            ->editColumn('created_at', function($model) {
                return convert_date($model->created_at);
            })
            ->addColumn('action', function($model) {
                return '
                    <button type="button" data-put="'.route('admin.category.update', $model->id).'" data-get="'.route('admin.category.edit', $model->id).'" class="btn btn-edit btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-url="'.route('admin.category.destroy', $model->id).'" class="btn btn-danger btn-destroy btn-sm"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['description', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
    {
        $this->query = $model->newQuery();
        return $this->applyScopes($this->query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->addTableClass('table table-hover')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(3)
                    ->buttons(
                        Button::make('create'),
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
            Column::make('name')->title('Category'),
            Column::make('description'),
            Column::make('created_at')->title('Created'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
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
        return 'Category_' . date('YmdHis');
    }
}
