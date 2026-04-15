@extends('admin.layout')

@section('title', 'Categories')
@section('page-title', 'Categories')
@section('breadcrumb')
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-tags-fill me-2" style="color:var(--primary)"></i>All Categories</span>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Category
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="text-muted">{{ $category->id }}</td>
                            <td class="fw-500">{{ $category->name }}</td>
                            <td><code style="font-size:12px">{{ $category->slug }}</code></td>
                            <td>{!! $category->parent?->name ?? '<span class="text-muted">—</span>' !!}</td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline"
                                    data-confirm="Delete this category?">
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
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
