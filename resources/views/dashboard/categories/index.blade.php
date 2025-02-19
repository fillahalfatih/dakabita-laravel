@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">category Categories</h1>
</div>

<div class="table-responsive">

    <a href="/dashboard/category/create" class="btn btn-primary mb-3">Create new category</a>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Emoji</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->emoji }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="/dashboard/category/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>

                    <a href="/dashboard/category/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                    <form action="/dashboard/category/{{ $category->slug }}" method="post" class="d-inline">
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
