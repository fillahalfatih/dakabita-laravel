@extends('layouts.main')

@section('container')
    {{-- <h1 class="text-center mt-4">{{ $title }}</h1> --}}

    <h4 class="text-center text-dark fw-semibold" style="margin: 4rem 0 2rem 0">📒 Katalog {{ $currentCategory ? $currentCategory->name : 'Produk' }}</h2>

    <div class="container d-flex gap-2 gap-lg-3 flex-row-reverse justify-content-center align-items-center" style="margin-bottom: 4rem">
        <form class="container m-0 p-0" action="/product" style="max-width: 525px !important">
            {{-- cari berdasarkan kategori --}}
            {{-- @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif --}}

            <div class="input-group mx-auto">
                <input type="text" class="form-control p-3" placeholder="Cari produk" name="search" value="{{ request('search') }}" required>
                <button class="btn btn-secondary px-3" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <div class="d-none">
            <select class="form-select py-3" id="category" name="category_id" aria-label="Default select example">
                <!-- Pilihan default -->
                <option value="/product" {{ is_null($currentCategory) ? 'selected' : '' }}>🍞 Semua Produk</option>


                <!-- Daftar kategori -->
                @foreach ($categories as $category)
                    <option value="/product?category={{ $category->slug }}" {{ $currentCategory && $currentCategory->id == $category->id ? 'selected' : '' }}>
                        {{ $category->emoji }} {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <ul class="d-lg-block d-flex justify-content-center m-0 list-group un-auth-toggle">
            <li class="nav-item dropdown list-group-item" style="padding: 13px 16px !important;">
                <a class="nav-link dropdown-toggle fw-medium fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="style=white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{-- {{ $currentCategory ? $currentCategory->emoji . ' ' . $currentCategory->name : '🍞 Semua Produk' }} --}}
                    {{ $currentCategory ? $currentCategory->emoji : '🍞' }} <i class="bi bi-sort-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <!-- Pilihan default -->
                    <li>
                        <a class="dropdown-item py-2 {{ is_null($currentCategory) ? 'active' : '' }}" href="/product">
                            🍞 Semua Produk
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <!-- Daftar kategori -->
                    @foreach ($categories as $category)
                        <li>
                            <a
                                class="dropdown-item py-2 {{ $currentCategory && $currentCategory->id == $category->id ? 'active' : '' }}"
                                href="/product?category={{ $category->slug }}">
                                {{ $category->emoji }} {{ $category->name }}
                            </a>
                        </li>
                        @if (!$loop->last)
                            <li><hr class="dropdown-divider"></li>
                        @else
                            <li><hr class="dropdown-divider d-none"></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>

    <form class="container d-none" action="/product">
        {{-- cari berdasarkan kategori --}}
        {{-- @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif --}}

        <div class="input-group mb-3 mx-auto" style="max-width: 500px !important; ">
            <input type="text" class="form-control p-3" placeholder="Cari produk" name="search" value="{{ request('search') }}" style="font-size: 14px !important">
            <button class="btn btn-secondary px-3" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <p class="category__links text-center d-none" style="font-size: 14px !important; margin-bottom: 4rem">
        <a class="mx-2 mx-md-3 text-decoration-none text-dark fw-medium {{ $title == 'Semua Produk — Dakabita' ? 'activated' : '' }}" href="/product">All</a> •
        @foreach ($categories as $category)
            <a class="mx-2 mx-md-3 text-decoration-none text-dark fw-medium {{ $title == $category->name . ' — Dakabita' ? 'activated' : '' }}" href="/product?category={{ $category->slug }}">{{ $category->name }}</a>
            @if (!$loop->last)
                •
            @endif
        @endforeach
    </p>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <div class="card">
                    <a href="/product/{{ $product->slug }}">
                        <img src="{{ asset('kue-kacang.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <span class="badge mb-2 fw-medium">{{ $product->category->name }}</span>
                        <a class="text-decoration-none text-dark" href="/product/{{ $product->slug }}">
                            <h6 class="card-title fw-semibold mt-1">{{ $product->name }}</h6>
                        </a>
                        <h6 class="text-danger fw-bold m-0">Rp {{ $product->price }}.000</h6>
                        {{-- <a href="#" class="btn btn-primary">Rp {{ $product->price }}</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center align-items-center mt-4 pt-4">
        {{ $products->links() }}
    </div> --}}
@endsection
