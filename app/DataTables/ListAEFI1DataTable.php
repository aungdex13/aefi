<?php

namespace App\DataTables;

use App\ListAEFI1;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ListAEFI1DataTable extends DataTable
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
            ->addColumn('action', 'listaefi1.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\ListAEFI1 $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ListAEFI1 $model)
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
                    ->setTableId('listaefi1-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
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
                'id',
                'hn',
                'an',
                'first_name',
                'sur_name',
                'age_while_sick_year',
                'age_while_sick_year',
                'age_while_sick_month',
                'age_while_sick_day',
                'nationality',
                'other_nationality',
                'subdistrict',
                'district',
                'province',
                'necessary_to_investigate',
                'id_case',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ListAEFI1_' . date('YmdHis');
    }
}
