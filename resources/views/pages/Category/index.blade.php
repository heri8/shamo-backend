@extends('layouts.app', ['pageSlug' => 'category'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Category</h2>
                            <a href="{{ route('category.create') }}"><button class="btn btn-info animation-on-hover"
                                    type="button">Create Category</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('category.edit', $item->id) }}">
                                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-pencil"></i>
                                            </button></a>

                                        <form action="{{ route('category.destroy', $item->id) }}" method="post"
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
