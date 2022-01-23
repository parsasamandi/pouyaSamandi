<?php

namespace App\DataTables\Skill;

use App\Models\Skill;
use App\Models\Explanation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Datatables\GeneralDataTable;
use Yajra\DataTables\Services\DataTable;

class DescriptionDataTable extends DataTable
{

    public $dataTable;

    public function __construct() {
        $this->dataTable = new GeneralDataTable();
    }
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
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->addColumn('explainable_id', function (Explanation $description) {
                return $description->explainable->title;
            })
            ->addColumn('action', function (Explanation $description) {
                return $this->dataTable->setAction($description->id);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Explanation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Explanation $model)
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
        return $this->dataTable->tableSetting($this->builder(), 
                $this->getColumns(), 'skillDescription');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
            Column::make('DT_RowIndex') // connect to 226 line columns
            ->title('#')
                ->searchable(false)
                ->orderable(false),
            Column::make('explanation')
            ->title('Description'),
            Column::make('explainable_id')
            ->title('Skill title'),
            $this->dataTable->setActionCol('| Edit')
        ];
    }

}