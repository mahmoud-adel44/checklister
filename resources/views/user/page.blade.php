@extends('layouts.master')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> {{ $page->title }}</strong>

            <p class="text-muted">
                {!! $page->content !!}
            </p>


        </div>
        <!-- /.card-body -->
    </div>

@endsection

