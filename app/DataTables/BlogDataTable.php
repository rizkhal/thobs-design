<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
        return datatables()
            ->eloquent($this->query)
            ->addIndexColumn()
            ->editColumn('content', function ($model) {
                return Str::words(strip_tags($model->content), 20);
            })
            ->editColumn('category.name', function($model) {
                return '<span class="label label-info">'.$model->category->name.'</span>';
            })
            ->editColumn('created_at', function ($model) {
                return convert_date($model->created_at);
            })
            ->addColumn('action', function ($model) {
                $status = ($model->status == true) ? 'fa-unlock' : 'fa-lock';
                return '
                        <button data-url="' . route('admin.blog.status') . '"
                                data-id="' . $model->id . '"
                                data-status="' . $model->status . '"
                                class="btn btn-status btn-sm btn-primary">
                            <i class="fa ' . $status . '"></i>
                        </button>
                        <a href="' . route('admin.blog.edit', $model->slug) . '" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil" style="color:white;"></i>
                        </a>
                        <button type="button" data-url="' . route('admin.blog.destroy', $model->slug) . '"
                                class="btn btn-destroy btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    ';
            })
            ->rawColumns(['category.name', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\BlogDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Blog $model)
    {
        $this->query = $model->newQuery()->with('category');
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
            ->setTableId('blogdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(4)
            ->buttons(
                Button::make('create')
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
            Column::make('content'),
            Column::make('category.name')
                ->title('Category'),
            Column::make('created_at')
                ->title('Created'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(160)
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
        return 'Blog_' . date('YmdHis');
    }
}
