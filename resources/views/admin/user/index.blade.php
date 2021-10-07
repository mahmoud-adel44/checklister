@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">List of Users</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" wire:sortable="updateTaskOrder">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>website</th>
                    <th>created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->website}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
@endsection
