@extends('layouts.master')
@section('css')
{{--    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">--}}
{{--    <!-- Tempusdominus Bootstrap 4 -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">--}}
{{--    <!-- Select2 -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
{{--    <!-- Bootstrap4 Duallistbox -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">--}}
{{--    <!-- BS Stepper -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">--}}
{{--    <!-- dropzonejs -->--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">--}}

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
            <h3 class="card-title">Title</h3>

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
            <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                  method="POST">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>checklist group Name:</label>
                            <input type="text" class="form-control my-colorpicker1 colorpicker-element"
                                   name="name" value="{{ $checklist->name }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Save Checklist</button>
                    </div>

                </div>
            </form>


            <!-- /.row -->
        </div>

    </div>
    <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
          method="POST">
        <div class="row">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger ml-2" type="submit"
                    onclick="return confirm('Are you sure you want to Delete this group')">Delete This Checklist
            </button>
        </div>
    </form>



    <hr/>

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">List of Tasks</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('tasks-table' , ['checklist' => $checklist])

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
    <div class="card card-default">
        @if ($errors->storetask->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->storetask->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">New Task</h3>

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
            <form action="{{ route('admin.checklists.tasks.store' , [$checklist]) }}" method="POST">
                <div class="row">
                    @csrf

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Task Name:</label>
                            <input type="text" class="form-control my-colorpicker1 colorpicker-element"
                                   name="name">
                        </div>
                        <div class="form-group">
                            <label>Task Description:</label>
                            <textarea class="form-control my-colorpicker1 colorpicker-element"
                                      name="description" rows="5" id="summernote">{{ old('description') }}</textarea>
                        </div>


                        <button class="btn btn-primary" type="submit">Save Task</button>
                    </div>

                </div>
            </form>


            <!-- /.row -->
        </div>

    </div>


@endsection


