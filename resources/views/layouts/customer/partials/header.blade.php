<header dir="rtl">
    <nav class="navbar navbar-expand-lg bg-dinersclub">
        <div class="container p-4">
            <!-- Brand logo section -->
            <div class="col-1 text-right">
                <div class="brand-wrap">
                    <a href="{{ route('home.index') }}">
                        <img class="logo" src="{{ asset('assets/images/DU-Agb.svg') }}" alt="Brand Logo">
                    </a>
                </div> <!-- brand-wrap.// -->
            </div>

            <div class="col-11 text-right">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto" id="buttons">
                        <!-- Home link -->
                        <li class="nav-item m-1">
                            <a class="nav-link @if(Route::is('home.index')) active @endif"
                               href="{{ route('home.index') }}">خانه</a>
                        </li>

                        <!-- Categories without dropdown -->
                        @foreach ($categories as $category)
                            <li class="nav-item m-1">
                                <a class="nav-link @if(request()->routeIs('home.category.products') && request()->category == $category->slug) active @endif"
                                   href="{{ route('home.category.products', $category) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="navbar-nav me-auto" id="login">
                        @if (Route::has('login'))
                            @auth
                                <div class="widgets-wrap float-right ml-auto mt-0">
                                    <div class="widget-header mr-3 ">
                                        <a href="{{ route('home.cart') }}" class="icon icon-sm rounded-circle border">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                        <span class="badge badge-pill badge-danger notify">{{ auth()->user()->cartItemCount() }}</span>
                                    </div>
                                </div> <!-- widgets-wrap.// -->
                                <li class="nav-item m-1">
                                    <a href="{{ route('dashboard') }}" class="nav-link">داشبورد</a>
                                </li>
                                <li class="nav-item m-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="nav-link" style="cursor: pointer;"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                                            خروج
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item m-1">
                                    <a href="{{ route('login') }}" class="nav-link">ورود</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item m-1">
                                        <a href="{{ route('register') }}" class="nav-link">ثبت نام</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
