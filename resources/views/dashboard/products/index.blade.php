@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product</h1>
</div>

<div class="table-responsive">

    <a href="/dashboard/product/create" class="btn btn-primary mb-3">Create new product</a>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($product->image)
                    <img src="{{ asset('storage/'. $product->image) }}" width="150px" alt="{{ $product->name }}">
                    @else
                    <img src="{{ asset('kue-kacang.png') }}" width="150px" alt="{{ $product->name }}">
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="/dashboard/product/{{ $product->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>

                    <a href="/dashboard/product/{{ $product->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                    <form action="/dashboard/product/{{ $product->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <span data-feather="x-circle"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
