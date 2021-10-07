@extends('layouts.master')
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
            <form action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}" method="POST">
            <div class="row">
            @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('New Checklist in ') }} {{ $checklistGroup->name }}</label>
                            <input type="text" class="form-control my-colorpicker1 colorpicker-element"
                                   name="name" value="{{ old('name') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

            </div>
            </form>
            <!-- /.row -->
        </div>

    </div>

@endsection
