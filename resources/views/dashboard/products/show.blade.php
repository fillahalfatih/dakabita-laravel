@extends('dashboard.layouts.main')

@section('container')

<div class="container my-4">
    <a href="/dashboard/product" class="btn btn-success"><span data-feather="arrow-left"></span>Back to product</a>
    <a href="/dashboard/product/{{ $product->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
    <form action="/dashboard/product/{{ $product->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
    </form>
</div>

<div class="container pt-lg-4 pb-4 pb-md-0 mt-4 d-md-flex justify-content-between gap-4">
    <div class="col-md-6">
        <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="">
        <div class="row justify-content-between mt-4">
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-4 mt-md-0">
        <h4 class="fw-bold text-dark">{{ $product->name }} • by <span class="text-danger">Dakabita</span></h4>
        <p>Kue Kacang Jadul Premium — 100% menggunakan margarin (No nabati oil). Kue Kacang Jadul Premium</p>
        <span class="badge">{{ $product->category->name }}</span>
        <table class="table table-bordered rounded-3">
            <tbody>
                <tr>
                    <td scope="row">Kategori</td>
                    <td>{{ $product->category->name }}</td>
                </tr>
                <tr>
                    <td scope="row">Netto</td>
                    <td>{{ $product->netto }}</td>
                </tr>
                <tr>
                    <td scope="row">Komposisi</td>
                    <td>Tepung, Margarin, Telur, Gula, Garam, Vanili, Kacang Tanah, Kacang Cacah</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="fixed-bottom border-top bg-white py-3">
    <div class="container" style="max-width: 1200px !important">
        <div class="d-flex container justify-content-between align-items-center">
            <h4 class="m-0">Rp {{ $product->price }}.000</h4>
            <button class="btn btn-primary">Pesan</button>
        </div>
    </div>
</div>
@endsection
