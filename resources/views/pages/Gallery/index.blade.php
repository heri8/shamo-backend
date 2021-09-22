@extends('layouts.app', ['pageSlug' => 'gallery'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Product Gallery</h2>
                            <a href="{{ route('product.gallery.create', $product->id) }}"><button class="btn btn-info animation-on-hover"
                                    type="button">Upload Photo</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Photo</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td><img style="max-width: 150px;" src="{{ $item->url }}"></td>
                                    <td class="td-actions text-center">
                                        <form action="{{ route('gallery.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                                <i class="tim-icons icon-simple-remove"></i>
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