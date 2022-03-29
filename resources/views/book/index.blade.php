@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Books') }}
                <a href="{{ route('books.create') }}" class="btn btn-success float-end">Create a new Book</a>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                    </div>
                @endif
                <h3>{{ 'List Book' }}</h3>
                <form action="" method="get">
                    <div class="mb-3">
                        <label for="" class="form-label">Search</label>
                        <div class="d-flex">
                            <input type="search" class="form-control" name="search" id="" value="{{ request()->search }}"
                                placeholder="Search">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped bg-info table-bordered table-hover table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Page</th>
                            <th>Author</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td scope="row">{{ $book->name }}</td>
                                <td scope="row">{{ $book->price }}</td>
                                <td scope="row">{{ $book->page }}</td>
                                <td scope="row">{{ $book->author->name }}</td>
                                <td>
                                    <form action="{{ route('books.destroy', [$book]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('books.show', [$book]) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ route('books.edit', [$book]) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No book</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
