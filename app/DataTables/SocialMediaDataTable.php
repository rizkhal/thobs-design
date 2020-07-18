<?php

namespace App\DataTables;

use App\Constants\Platform;
use App\Models\SocialMedia;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SocialMediaDataTable extends DataTable
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
            ->editColumn('platform', function($model) {
                return strtolower(Platform::label($model->platform));
            })
            ->editColumn('created_at', function($model) {
                return convert_date($model->created_at);
            })
            ->addColumn('icon', function($model) {
                return '<i class="fa fa-'.social_render($model->platform).'"></i>';
            })
            ->addColumn('action', function($model) {
                return '
                    <button type="button" data-put="'.route('admin.setting.social.update', $model->id).'" data-get="'.route('admin.setting.social.edit', $model->id).'" class="btn btn-edit btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-url="'.route('admin.setting.social.destroy', $model->id).'" class="btn btn-danger btn-destroy btn-sm"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['link', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\SocialMediaDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SocialMedia $model)
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
                    ->addTableClass('table table-hover')
                    ->setTableId('socialmediadatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(3)
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
            Column::make('link'),
            Column::make('platform'),
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
        return 'SocialMedia_' . date('YmdHis');
    }
}
