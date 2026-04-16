@extends('admin.layout')

@section('title', 'Customers')
@section('page-title', 'Customers')
@section('breadcrumb')
    <li class="breadcrumb-item active">Customers</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-award-fill me-2" style="color:var(--primary)"></i>All Customers</span>
            <a href="{{ route('admin.customers.create') }}" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i> New Customers
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
                    @forelse($customers as $customer)
                        <tr>
                            <td class="text-muted">{{ $customer->id }}</td>
                            <td>
                                @if($customer->logo)
                                    <img src="{{ asset('storage/' . $customer->logo) }}"
                                         alt="{{ $customer->name }}"
                                         style="width:40px;height:40px;object-fit:contain;border-radius:6px;border:1px solid #eee;padding:3px;">
                                @else
                                    <div style="width:40px;height:40px;background:#f4f6fb;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-500">{{ $customer->name }}</td>
                            <td>
                                @if($customer->is_active)
                                    <span class="badge-active">Active</span>
                                @else
                                    <span class="badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:13px">{{ $customer->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.customers.edit', $customer) }}"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline"
                                    data-confirm="Delete this customer?">
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
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i> No customers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($customers->hasPages())
            <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                {{ $customers->links() }}
            </div>
        @endif
    </div>
@endsection
