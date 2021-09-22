@extends('layouts.app', ['pageSlug' => 'category'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Edit Category</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ old('name') ? old('name') : $item->name }}" type="text" class="form-control"
                                id="name" name="name" placeholder="Category Name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="text-muted">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
