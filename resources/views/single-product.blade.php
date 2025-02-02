@extends('layouts.second')

@section('container')
<div class="container pt-lg-4 pb-4 pb-md-0 mt-4 d-md-flex justify-content-between gap-4">
    <div class="col-md-6">
        @if ($product->image)
        <img class="rounded-3" style="width: 100%" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
        <div class="row justify-content-between mt-4">
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
            </div>
        </div>
        @else
        <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="{{ $product->name }}">
        <div class="row justify-content-between mt-4">
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="{{ $product->name }}">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="{{ $product->name }}">
            </div>
            <div class="col-md-4" style="max-width: 33.33%;">
                <img class="rounded-3" style="width: 100%" src="{{ asset('kue-kacang.png') }}" alt="{{ $product->name }}">
            </div>
        </div>
        @endif
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
