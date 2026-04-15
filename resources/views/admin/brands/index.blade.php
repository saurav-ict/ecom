@extends('admin.layout')

@section('title', 'Brands')
@section('page-title', 'Brands')
@section('breadcrumb')
    <li class="breadcrumb-item active">Brands</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-award-fill me-2" style="color:var(--primary)"></i>All Brands</span>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Brand
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td class="text-muted">{{ $brand->id }}</td>
                            <td>
                                @if($brand->logo)
                                    <img src="{{ asset('storage/' . $brand->logo) }}"
                                         alt="{{ $brand->name }}"
                                         style="width:40px;height:40px;object-fit:contain;border-radius:6px;border:1px solid #eee;padding:3px;">
                                @else
                                    <div style="width:40px;height:40px;background:#f4f6fb;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-500">{{ $brand->name }}</td>
                            <td>
                                @if($brand->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:13px">{{ $brand->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.brands.edit', $brand) }}"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="d-inline"
                                    data-confirm="Delete this brand?">
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
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No brands found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($brands->hasPages())
            <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                {{ $brands->links() }}
            </div>
        @endif
    </div>
@endsection
