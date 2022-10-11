@extends('admin::layouts.master')

@section('page_title')
    Add Advertisement Banner
@stop

@push('css')
<style>
    .input_image{
        display: none;
    }

</style>
@endpush

@section('content-wrapper')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Test Package</h1>
            </div>

            <div class="page-action">
            </div>
        </div>

        <div class="page-content">
            <datagrid-plus src="{{ route('admin.catalog.products.index') }}"></datagrid-plus>
        </div>
    </div>
@stop

