@extends('layouts.app', ['pageSlug' => 'product'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Product</h2>
                            <a href="{{ route('product.create') }}"><button class="btn btn-info animation-on-hover"
                                    type="button">Add Product</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td style="word-wrap: break-word;min-width: 120px;max-width: 120px;">{{ $item->name }}
                                    </td>
                                    <td>&dollar; {{ $item->price }}</td>
                                    <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                        {{ $item->description }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('product.gallery.index', $item->id) }}">
                                            <button rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                            <i class="tim-icons icon-image-02"></i>
                                        </button></a>
                                        
                                        <a href="{{ route('product.edit', $item->id) }}">
                                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-pencil"></i>
                                            </button></a>

                                        <form action="{{ route('product.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                                <i class="tim-icons icon-trash-simple"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        Data tidak tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
