<?php

namespace App\DataTables;

use App\Models\Url;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShortenerDataTable extends DataTable
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
            ->editColumn('keyword', function ($model) {
                $url = config('app.url') . "/$model->keyword";
                return '<span class="text-muted" id="shorturl" data-url="'.$url.'">'
                        . urlRemoveScheme($url) .
                        '</span>';
            })
            ->editColumn('long_url', function ($model) {
                return '
                    <span style="font-weight:bold;">'.Str::limit($model->meta_title, 50).'</span>
                    <br>
                    <a href="' . $model->long_url . '" target="_blank" title="' . $model->long_url . '" class="text-muted">' . Str::limit($model->long_url, 50) . '</a>
                    ';
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('action', function ($model) {
                return '
                    <a href="' . route('admin.shortener.edit', $model->id) . '" class="btn btn-edit btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                    <button type="button" data-url="' . route('admin.shortener.destroy', $model->id) . '" class="btn btn-danger btn-destroy btn-sm"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['keyword', 'long_url', 'created_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Url $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Url $model)
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
            ->setTableId('shortenerdatatable-table')
            ->addTableClass('table table-hover')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(4, 'desc')
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
            Column::make('keyword')->title('Short Url'),
            Column::make('long_url')->title('Original Url'),
            Column::make('clicks'),
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
        return 'Shortener_' . date('YmdHis');
    }
}
