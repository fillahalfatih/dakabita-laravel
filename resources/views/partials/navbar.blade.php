<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<nav class="navbar navbar-expand-lg bg-body-light py-4 border-bottom">
    <div class="container px-4" style="max-width: 1200px !important">
        <a class="navbar-brand" href="/">
            <img width="60px" src="{{ asset('dakabita-logo.png') }}" alt="Dakabita Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-medium" href="/product" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu w-100">
                        <li><a class="dropdown-item py-2" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse me-2"></i> Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="divider-container"><hr class="divider"></li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 text-center gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link fw-medium" aria-current="page" href="#">Tentang</a>
                </li>
                <li><hr class="divider"></li>
                <li class="nav-item dropdown un-auth-toggle">
                    <a class="nav-link dropdown-toggle fw-medium" href="/product" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item py-2 px-lg-4" href="/product">🍞 All Product</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item py-2 px-lg-4" href="/product?category={{ $category->slug }}">{{ $category->emoji }} {{ $category->name }}</a></li>
                            @if (!$loop->last)
                                <li><hr class="dropdown-divider"></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="divider-container"><hr class="divider"></li>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var dropdown = document.querySelector('.nav-item.dropdown');
                        var divider = document.querySelector('.divider-container');
                        dropdown.addEventListener('show.bs.dropdown', function () {
                            divider.style.color = 'white';
                        });
                        dropdown.addEventListener('hide.bs.dropdown', function () {
                            divider.style.color = 'initial';
                        });
                    });
                </script>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="#">Order</a>
                </li>
                <li><hr class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="#">FAQ</a>
                </li>
            </ul>
            <div class="d-lg-block d-flex justify-content-center mt-lg-0 mt-3">
                <a target="_blank" class="btn px-4 py-2 btn-primary fw-medium" href="https://wa.me/6285773640384"><i class="bi bi-whatsapp me-2"></i>Kontak</a>
            </div>
            @endauth
        </div>
    </div>
</nav>
