@extends('layouts.app', ['pageSlug' => 'product'])

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Product</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Product Name</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}"
                        class="form-control @error('name') is-invalid @enderror" />
                    @error('name')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags" class="form-control-label">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags') ? old('tags') : $item->tags }}"
                        class="form-control @error('tags') is-invalid @enderror" />
                    @error('type')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories_id">Category</label>
                    <select class="form-control" id="categories_id" name="categories_id">
                        <option value="{{ $item->categories_id }}">{{ \App\Models\ProductCategory::find($item->categories_id)->name }}</option>
                        <option disabled>----</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Description</label>
                    <textarea name="description"
                        class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
                    @error('description')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Price</label>
                    <input type="number" name="price" value="{{ old('price') ? old('price') : $item->price }}"
                        class="form-control @error('price') is-invalid @enderror" />
                    @error('price')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
