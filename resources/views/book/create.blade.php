@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Books') }}
                <a href="{{ route('books.index') }}" class="btn btn-success float-end">List Book</a>
            </div>
            <div class="card-body">
                <h3>{{ 'Create Book' }}</h3>
                <form action="{{ route('books.store') }}" method="post">
                    @csrf
                    <div class=" form-group mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Input name">
                    </div>
                    <div class=" form-group mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="" placeholder="Input price">
                    </div>
                    <div class=" form-group mb-3">
                        <label for="" class="form-label">Page</label>
                        <input type="number" class="form-control" name="page" id="" placeholder="Input page">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose an Author</label>
                        <select class="form-select" name="author_id" id="">
                            @forelse ($authors as $author)
                                <option value="{{ $author->_id }}">{{ $author->name }}</option>
                            @empty
                                <option value="">No author</option>
                            @endforelse
                        </select>
                    </div>
                    <button class="btn btn-success m-3 float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
