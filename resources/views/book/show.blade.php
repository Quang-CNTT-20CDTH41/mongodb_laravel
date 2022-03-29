@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Books') }}
                <a href="{{ route('books.index') }}" class="btn btn-success float-end">List Book</a>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                    </div>
                @endif
                <h3>{{ 'Show Book' }}</h3>
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
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
