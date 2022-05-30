@extends('user.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            @if($users->count() > 0)
                <h3>Pick a user to chat with</h3>
                <ul id="users">
                    @foreach($users as $user)
                        <li class="card rounded-3 p-3 py-4"><a href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}"><span><img src="{{asset($user->avatar)}}" alt="" width="40"></span><span class="ms-4 chat_a_text">{{ $user->name }}</span></a></li>
                    @endforeach
                </ul>
            @else
                <p>No users found! try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
    </div>
    <div id="chat_box" class="chat_box pull-right" style="display: none">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat with <i class="chat-user"></i> </h3>
                            <span class="glyphicon glyphicon-remove pull-right close-chat"></span>
                        </div>
                        <div class="panel-body chat-area">
    
                        </div>
                        <div class="panel-footer">
                            <div class="input-group form-controls">
                                <textarea class="form-control input-sm chat_input" placeholder="Write your message here..."></textarea>
                                <span class="input-group-btn ps-3">
                                        <button class="btn btn-primary btn-sm btn-chat" type="button" data-to-user="" disabled>
                                            <i class="glyphicon glyphicon-send"></i>
                                            Send</button>
                                    </span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <input type="hidden" id="to_user_id" value="" />
    </div>
    <div id="chat-overlay" class="postion-relative"></div>

    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
@stop
@section('script')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
@stop