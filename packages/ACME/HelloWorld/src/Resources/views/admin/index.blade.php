@extends('admin::layouts.master')

@section('page_title')
    Package HelloWorld
@stop

@section('content-wrapper')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Package HelloWorld</h1>
            </div>

            <div class="page-action">
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="{{ route('admin.catalog.products.index') }}"></datagrid-plus>
        </div>
    </div>

@stop