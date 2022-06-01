<div class="user-panel-content">
    <div class="row">
        <div class="col-lg-3">
            <aside class="left-side-content">
                <h5 class="panel-link-title">{{ __('messages.my_listening')}}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('user.dashboard')}}" class="panel-links">{{ __('messages.dashboard')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.product.index')}}" class="panel-links">{{ __('messages.my_ads')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.wishlist.index')}}" class="panel-links">{{ __('messages.favourite_ads')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.feedback.show')}}" class="panel-links">{{ __('messages.feedback')}}</a>
                    </li>
                </ul>
                <h5 class="panel-link-title">{{ __('messages.my_account')}}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="panel-links">{{ __('messages.settings')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.message') }}" class="panel-links">{{ __('messages.messages')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="panel-links"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{-- <i class="fa-solid fa-right-from-bracket"></i> --}}
                            {{-- <span class="icon-caption text-center">Logout</span> --}}
                            {{ __('messages.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="col-lg-9">
