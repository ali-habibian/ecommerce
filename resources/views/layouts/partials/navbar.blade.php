<nav class="navbar navbar-expand-lg main-navbar">

    <ul class="navbar-nav navbar-right ms-auto">
        <li class="dropdown">
            <a href="#"
               data-bs-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">سلام, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#"
                   class="dropdown-item has-icon">
                    <i class="far fa-user"></i> پروفایل
                </a>

                <div class="dropdown-divider"></div>

                <form action="{{ route('logout') }}"
                      method="post"
                      id="logout">
                    @csrf
                    <a onclick="document.getElementById('logout').requestSubmit()"
                       data-turbo-method="post"
                       class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> خروج
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
