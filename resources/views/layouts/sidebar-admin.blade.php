
<!-- SIDEBAR -->
<section id="sidebar">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text"> {{ Auth::user()->name }}</span>
        </a>

        <ul class="side-menu top navbar-nav">
            <li id="Dashboard">
                <a href="{{ route('dashboard')}}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li id="blocks">
                <a  href="{{route('blocks')}}">
                    <i class='bx bx-edit-alt'></i>
                    <span class="text">My Blocks</span>
                </a>
            </li>
            <li id="posts">
                <a  href="{{route('posts')}}">
                    <i class="bx bx-file"></i>
                    <span class="text">My Posts</span>
                </a>
            </li>

            <li id="pages">
                <a  href="{{route('statics')}}">
                    <i class="bx bx-note"></i>
                    <span class="text">My Pages</span>
                </a>
            </li>

            <li id="simple-slider">
                <a  href="{{route('simple-slider')}}">
                    <i class="bx bx-note"></i>
                    <span class="text">My Slider</span>
                </a>
            </li>
            <li id="product">
                <a  href="{{route('cars.index')}}">
                    <i class="bx bx-note"></i>
                    <span class="text">My Product</span>
                </a>
            </li>
            <li id="category">
                <a  href="{{route('category')}}">
                    <i class="bx bx-note"></i>
                    <span class="text">My Category</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li id="Settings">
                <a href="{{ route('setting') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>


            <li>
                <a class="logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                     <i class='bx bxs-log-out-circle'></i>
                                     <span class="text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>

    @endguest

</section>
<!-- SIDEBAR -->
