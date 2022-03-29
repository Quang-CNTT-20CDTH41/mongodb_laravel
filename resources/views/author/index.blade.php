@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Authors') }}
                <a href="{{ route('authors.create') }}" class="btn btn-success float-end">Create a new Author</a>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                    </div>
                @endif
                <h3>{{ 'List Author' }}</h3>
                <table class="table table-striped bg-info table-bordered table-hover table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Books</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $author)
                            <tr>
                                <td scope="row">{{ $author->name }}</td>
                                <td scope="row">{{ count($author->books) }}</td>
                                <td>
                                    <form action="{{ route('authors.destroy', [$author]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('authors.edit', [$author]) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No author</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
