<?php
$user = App\Models\User::find(auth()->user()->id);
?>
<body>
    <!-- HEADER SECTION START -->
    <div class="panel-header d-flex flex-wrap justify-content-between align-items-center">
        <div class="n-logo">
            <a href="{{route('home')}}"><img src="{{asset('assets\img\Baobab-Logo.png')}}" alt=""></a>
        </div>
        <div class="right-p-img d-flex align-items-center">
            <div class="right_logo_">
                <img src="{{asset($user->avatar)}}" class="panel-r-img" alt="">
            </div>
            <h5 class="right_logo_text ms-3">{{$user->name}}</h5>
        </div>
    </div>
    <!-- HEADER SECTION END -->
