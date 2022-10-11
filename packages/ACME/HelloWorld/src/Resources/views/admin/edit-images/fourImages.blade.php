@extends('admin::layouts.master')
<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@section('page_title')
    Edit One Advertisement
@stop

@push('css')
    <style>
        .body_content{
            box-shadow: 2px 2px 2px gray;
            border: 0.5px solid gray;
            border-radius: 5px;
            margin: 0 20% 0 20%;
        }
        .title{
            padding: 20px;
        }
        .image{
            padding: 20px;
        }
        .type{
            padding: 20px;
        }
        .hyperlink{
            padding: 20px;
        }

        .show_images{
            margin-top: 5%;
        }
        .show_images h3{
            text-align: center;
            margin: 20px;
        }
        .required{
            color: red;
        }
    </style>
@endpush


@section('content-wrapper')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i onclick="window.location = 'http://127.0.0.1:8000/admin/helloworld/one'" class="icon angle-left-icon back-link"></i>
                    Add One Advertisement Banner
                </h1>
            </div>

            <div class="page-action">
            </div>
        </div>
        
        <div class="page-content">
            <div slot="body" class="body_content">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="container">
                        <div class="row">
                            <div class="title">
                                <label>Add Banner Title <span class="required">*</span></label><br>
                                <input class="form-control" name="banner_title" type="text" value="{{$values->banner_title}}">
                            </div>

                            <div class="image">
                                <label>Add Banner Image <span class="required">*</span></label><br>
                                <input class="form-control" name="image" type="file">
                            </div>                                    
                            <div class="type">
                                <label>Banner Type:</label><br>
                                <input class="form-control" name="banner_type" type="text" value="Four" readonly>
                            </div>
                            <div class="hyperlink">
                                <label>Add Banner Hyperlink <span class="required">*</span></label><br>
                                <input class="form-control" name="banner_hyperlink" type="text" value="{{$values->banner_hyperlink}}">
                            </div>
                            <div class="submit d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Edit Image</button>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>

@stop


@push('script')

@endpush