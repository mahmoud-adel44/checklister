@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Online Users</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group" id="online-users" style=" list-style-type: none;">
                                <h1 class="ml-2 mt-4" id="no-online-users">No Online Users <i
                                        class="far fa-sad-tear text-warning"></i></h1>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="height:700px; overflow-y: scroll" id="msg-list">
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">
                                    <!-- message -->
                                    <div class="post clearfix " id="chat">
                                        @foreach($message as $message)
                                            <div
                                                class="mt-4 w-50 text-white p-3 rounded {{ auth()->user()->id == $message->user_id  ? ' bg-primary' : 'ml-auto bg-warning'}}">
                                                <p>{{ $message->user->name }}</p>
                                                <p>{{ $message->body }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.message -->
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                        <form action="" class="form-horizontal mt-2">
                            <div class="input-group input-group-sm mb-0">
                                <input class="form-control  form-control-sm" type="text" name=""
                                       data-url="{{ route('message.store') }}" placeholder="Message" id="chat-text">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="send">Send <i class="far fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
