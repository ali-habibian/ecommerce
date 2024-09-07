<header class="section-header border-bottom">

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-2 navbar-light d-md-none">
                    <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                            data-target="#main_nav" aria-controls="main_nav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-dark"></span>
                    </button>
                </div>
                <div class="col-md-3 col-4">
                    <div class="brand-wrap mx-auto">
                        <a href="{{ route('home.index') }}">
                            <img class="logo" src="{{ asset('assets/images/DU-Agb.svg') }}">
                        </a>
                    </div> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-sm-12 col-5 d-none d-md-block">
                    <form action="#" class="search" {{ stimulus_controller('form-search') }}>
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="جستجو" {{ stimulus_target('form-search', 'input') }} {{ stimulus_action('form-search', 'searchByEnter', 'keypress') }}>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" {{ stimulus_action('form-search', 'search') }}>
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- col.// -->
                <div class="col-md-2 col-4">
                    <div class="widgets-wrap float-right ml-auto mt-0">
                        <div class="widget-header mr-3 ">
                            <a href="#" class="icon icon-sm rounded-circle border">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <span class="badge badge-pill badge-danger notify">1</span>
                        </div>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->

    <nav class="navbar navbar-main navbar-expand-lg navbar-light mb-0 py-0 pb-y-2 mb-md-2">
        <div class="container">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('home.index') }}">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">فروشگاه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تماس با ما</a>
                    </li>
                    @foreach ($categories->take(4) as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="#">{{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item d-md-none">
                        <div class="col-12 py-5">
                            <form action="#" class="search" {{ stimulus_controller('form-search') }}>
                                <div class="input-group w-100">
                                    <input type="text" class="form-control" placeholder="Search" {{ stimulus_target('form-search', 'input') }} {{ stimulus_action('form-search', 'searchByEnter', 'keypress') }}>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" {{ stimulus_action('form-search', 'search') }}>
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
