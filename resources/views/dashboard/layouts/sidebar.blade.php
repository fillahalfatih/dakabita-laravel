<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/order') ? 'active' : ''}}" href="#">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : ''}}" href="/dashboard/product">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/report') ? 'active' : ''}}" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
        </ul>

        {{-- @can('admin') --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : ''}}" href="/dashboard/category">
                    <span data-feather="grid"></span>
                    Categories
                </a>
            </li>
        </ul>
        {{-- @endcan --}}

    </div>
</nav>
