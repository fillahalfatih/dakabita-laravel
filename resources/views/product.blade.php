@extends('layouts.main')

@section('container')
    {{-- <h1 class="text-center mt-4">{{ $title }}</h1> --}}

    <h4 class="text-center text-dark fw-semibold" style="margin: 4rem 0 1rem 0">📒 Katalog Produk</h2>

    <p class="category__links text-center" style="font-size: 14px !important; margin-bottom: 4rem;">
        <a class="mx-2 mx-md-3 text-decoration-none text-dark fw-medium {{ $title == 'Semua Produk — Dakabita' ? 'activated' : '' }}" href="/product">All</a> •
        @foreach ($categories as $category)
            <a class="mx-2 mx-md-3 text-decoration-none text-dark fw-medium {{ $title == $category->name . ' — Dakabita' ? 'activated' : '' }}" href="/product?category={{ $category->slug }}">{{ $category->name }}</a>
            @if (!$loop->last)
                •
            @endif
        @endforeach
    </p>

    {{-- <form action="/product">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari produk" name="search" value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit"></button>
        </div>
    </form> --}}

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
