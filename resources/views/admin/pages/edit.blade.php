@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')

    <div class="card card-default">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">Edit Page</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.pages.update', [$page]) }}"
                  method="POST">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Edit Title:</label>
                            <input type="text" class="form-control my-colorpicker1 colorpicker-element"
                                   name="title" value="{{ $page->title }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Content:</label>
                            <textarea type="text" class="form-control my-colorpicker1 colorpicker-element" rows="5"
                                   name="content" id="summernote" >{{ $page->content }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save Page</button>
                    </div>

                </div>
            </form>


            <!-- /.row -->
        </div>

    </div>


@endsection
