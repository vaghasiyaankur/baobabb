@if($message->from_user == \Auth::user()->id)
<div class="row msg_container base_receive" data-message-id="{{ $message->id }}">
        <div class="col-md-12 mb-2  d-flex flex-wrap align-items-start justify-content-end mb-3">
             <div class="user_icon mt-2">   
                 <!-- <i class="fa-solid fa-user admin_chat_logo"></i> -->
                <!-- <img src="{{ url('images/user-avatar.png') }}" width="50" height="50" class=" img-responsive "> -->
            </div>
            <div class="messages msg_receive  ">
                <p class="p-2 mb-0">{!! $message->content !!}</p>
                <time class="d-flex justify-content-end" datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ $message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
        </div>
    </div>
@else
<div class="row msg_container base_sent" data-message-id="{{ $message->id }}">
        <div class="col-md-12 d-flex flex-wrap align-items-start justify-content-start mb-2">
            <div class="user_icon avatar mt-2">
                <i class="fa-solid fa-user admin_chat_logo"></i>
                <!-- <img src="{{ url('images/user-avatar.png') }}" width="50" height="50" class="img-responsive"> -->
            </div>
            <div class="messages msg_sent ">
                <p class="p-3 mb-0">{!! $message->content !!}</p>
                <time datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ $message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
    </div>
   
@endif