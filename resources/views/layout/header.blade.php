<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Let’s buy something ♥!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Shop
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/shop') }}">Shop Products</a>
                    <a class="dropdown-item" href="#">How to order</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Our Feedback</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>


         <ul class="navbar-nav mr-right">
            @if(Auth::check())

                @if (Auth::user()->type === \App\Users::TYPE_ADMIN)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                    </li>
                @endif


                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/orders') }}">Orders</a>
                </li>
                <li class="nav-item active">
                    @php($products = \Illuminate\Support\Facades\Session::get('products'))
                    @php($total = 0)
                    @if (empty($products) === false)
                        @foreach($products as $id => $qt)
                            @php($total = $total + $qt)
                        @endforeach
                    @endif

                    <a data-total="{{ $total }}" class="nav-link basket-link" href="{{ url('/basket') }}">Basket ({{ $total }})</a>
                </li>
                
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>

            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/signup') }}">Sign Up</a>
                </li>
            @endif


        </ul>


        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
