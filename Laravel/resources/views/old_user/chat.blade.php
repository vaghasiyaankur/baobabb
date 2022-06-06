<!-- resources/views/chat.blade.php -->

@extends('user.layouts.app')

@section('title')
    @if (isset($user))
        User Edit
    @else
        User Add
    @endif
@endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script>
        var base_url = '{{ url('/') }}';
    </script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                @if ($users->count() > 0)
                    <h3>Pick a user to chat with</h3>
                    <ul id="users">
                        @foreach ($users as $user)
                            <li><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);"
                                    class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open
                                    chat</a></li>
                        @endforeach
                    </ul>
                @else
                <section class="d-flex justify-content-center align-items-center details-box">
                    <div class="text-center">
                        <a href="{{route('home')}}" style="color:#364b5a;"><i class="fa-solid fa-circle-plus" style="font-size: 55px;"></i></a>
                        <h3>Currently you don't have any favorite ads, please add some.</h3>
                    </div>
                </section>
                @endif
            </div>
        </div>
        @include('chat-box')
        <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
        <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
        <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
    </div>

    <div id="chat-overlay" class="row"></div>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
@endsection
