@extends('admin.layout')

@section('title', 'Properties')
@section('page-title', 'Properties')
@section('breadcrumb')
    <li class="breadcrumb-item active">Properties</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-sliders me-2" style="color:var(--primary)"></i>All Properties</span>
            <a href="{{ route('admin.properties.create') }}" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Property
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Options</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                        <tr>
                            <td class="text-muted">{{ $property->id }}</td>
                            <td class="fw-500">{{ $property->name }}</td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $property->options_count }}</span>
                            </td>
                            <td>
                                @if($property->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:13px">{{ $property->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.properties.edit', $property) }}"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST"
                                      class="d-inline" data-confirm="Delete this property and all its options?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No properties found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($properties->hasPages())
            <div class="card-footer">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
@endsection
