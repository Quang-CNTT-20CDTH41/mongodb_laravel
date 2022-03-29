@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Authors') }}
                <a href="{{ route('authors.index') }}" class="btn btn-success float-end">List Author</a>
            </div>
            <div class="card-body">
                <h3>{{ 'Edit Author' }}</h3>
                <form action="{{ route('authors.update', [$author]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $author->name }}"
                            placeholder="Input name">
                    </div>
                    <button class="btn btn-success m-3 float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
