@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')

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
            <h3 class="card-title">Edit Task</h3>

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
            <form action="{{ route('admin.checklists.tasks.update', [ $checklist ,$task ]) }}"
                  method="POST">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Edit Name:</label>
                            <input type="text" class="form-control my-colorpicker1 colorpicker-element"
                                   name="name" value="{{ $task->name }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Description:</label>
                            <textarea type="text" class="form-control my-colorpicker1 colorpicker-element" rows="5"
                                   name="description" id="summernote" >{{ $task->description }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save Task</button>
                    </div>

                </div>
            </form>


            <!-- /.row -->
        </div>

    </div>


@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection
