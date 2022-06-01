<div class="user-panel-content">
    <div class="row">
        <div class="col-lg-3">
            <aside class="left-side-content">
                <h5 class="panel-link-title">MY LISTINGS</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('user.dashboard')}}" class="panel-links">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.product.index')}}" class="panel-links">My ads</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.wishlist.index')}}" class="panel-links">Favorite ads</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.feedback.show')}}" class="panel-links">Feedback</a>
                    </li>
                </ul>
                <h5 class="panel-link-title">MY ACCOUNT</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="panel-links">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.message') }}" class="panel-links">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="panel-links"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{-- <i class="fa-solid fa-right-from-bracket"></i> --}}
                            {{-- <span class="icon-caption text-center">Logout</span> --}}
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="col-lg-9">
