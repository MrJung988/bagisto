<?php

namespace ACME\TestPackage\Datagrids;

use Illuminate\Support\Facades\DB;
use Webkul\Ui\DataGrid\DataGrid;

class TestDataGrid extends DataGrid
{
    protected $index = 'id';

    protected $sortOrder = 'desc';

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('attributes')
        ->select('id')
        ->addSelect('id', 'code', 'admin_name', 'type', 'is_required', 'is_unique', 'value_per_locale', 'value_per_channel');

        $this->setQueryBuilder($queryBuilder);
        
        //queryBuilder = DB::table('table')->addSelect('id');

        //$this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'id',
            'label' => trans('admin::app.datagrid.id'),
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
    
        $this->addColumn([
            'index' => 'code',
            'label' => trans('admin::app.datagrid.code'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);
    }

    public function prepareActions()
    {
        $this->addAction([
            'title' => trans('admin::app.datagrid.edit'),
            'method' => 'GET',
            'route' => 'admin.catalog.attributes.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);
    
        $this->addAction([
            'title' => trans('admin::app.datagrid.delete'),
            'method' => 'POST',
            'route' => 'admin.catalog.attributes.delete',
            'icon' => 'icon trash-icon'
        ]);
    }
}