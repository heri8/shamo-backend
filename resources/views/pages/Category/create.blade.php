@extends('layouts.app', ['pageSlug' => 'category'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Category >> Create</h2>
                        </div>
                    </div>
                </div>
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
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name"
                                placeholder="Category Name">
                        </div>
                        <button type="submit" class="btn btn-info">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection