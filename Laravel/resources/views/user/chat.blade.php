@extends('user.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            @if ($users->count() > 0)
                <h3>Pick a user to chat with</h3>
                <ul id="users">
                    @foreach ($users as $user)
                        <li class="card rounded-3 p-3 py-4"><a href="javascript:void(0);" class="chat-toggle"
                                data-id="{{ $user->id }}" data-user="{{ $user->name }}"><span><img
                                        src="{{ asset($user->avatar) }}" alt="" width="40"></span><span
                                    class="ms-4 chat_a_text">{{ $user->name }}</span></a></li>
                    @endforeach
                </ul>
            @else
                <p>No users found! try to add a new user using another browser by going to <a
                        href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
        <div class="col-md-9">
            <div id="chat-overlay" class="" style="position:relative;"></div>
            <div id="chat_box" class="chat_box pull-right" style="display: none">
                <div class="panel panel-default">
                    <div class="panel-heading p-4 position-relative">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment me-2"></span> Chat with <i
                                class="chat-user"></i> </h3>
                        <div class="conversation-review" id="review_section" style="display: none">
                            <div id="reviewBtn" class="show-modal"><a href="javascript:;" class="launch-review">
                                    <i class="fa-solid fa-star"></i>
                                    <span>Rate Your Experience</span>
                                </a>
                            </div>
                            {{-- Send Message Model --}}
                            <div id="testmodal" class="modal fade">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content p-3">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Rate Your Experience</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>

                                        <div class="modal-body login_modal p-2">
                                            <form action="{{route('user.rating.post')}}" method="post">
                                                @csrf
                                                <h5 class="modal-title mb-4" id="exampleModalLabel">Your Rating*</h5>
                                                <input type="hidden" name="user_id" id="user_id">
                                                <div class="rating">
                                                    <label>
                                                        <input type="radio" name="stars" value="1" />
                                                        <span class="icon">✰</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="2" />
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="3" />
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="4" />
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="5" required/>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                        <span class="icon">✰</span>
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                <h5 class="modal-title mb-4" id="exampleModalLabel">Write Review*</h5>
                                                <textarea name="review" id="review" cols="30" rows="5" class="form-control border-0 border-bottom p-0 rounded-0" required></textarea>
                                                        <span class="error text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="ajax-form-result pb-3">
                                                    <div class="alert-error" id="login_alert_error"></div>
                                                </div>
                                                <div class="ajax-form-result pb-3">
                                                    <div class="alert-success" id="login_alert_success"></div>
                                                </div>
                                                <div class="my-4">
                                                    <button type="submit" id="login_btn" class="btn model_btn w-100 fw-bold"
                                                        type="button">SEND</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script>
        $(document).ready(function() {
            var show_btn = $('.show-modal');
            var show_btn = $('.show-modal');
            //$("#testmodal").modal('show');

            show_btn.click(function() {
                $("#testmodal").modal('show');
            })
        });

        $(function() {
            $('#reviewBtn').on('click', function(e) {
                Custombox.open({
                    target: '#testmodal-1',
                    effect: 'fadein'
                });
                e.preventDefault();
            });
        });
    </script>

@stop
