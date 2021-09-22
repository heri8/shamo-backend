@extends('layouts.app', ['pageSlug' => 'product'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="alert alert-danger text-white font-bold rounded-t px-4 py-2">
                                There's something wrong!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name"
                                placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input value="{{ old('tags') }}" type="text" class="form-control" id="tags" name="tags"
                                placeholder="Product Tags. Comma Separated. Example: popular">
                        </div>
                        <div class="form-group">
                            <label for="categories_id">Category</label>
                            <select class="form-control" id="categories_id" name="categories_id">
                                <option>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Product Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input value="{{ old('price') }}" type="number" class="form-control" id="price" name="price"
                                placeholder="Product Price">
                        </div>
                        <button type="submit" class="btn btn-info">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
