@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    @php
        $stats = [
            ['label' => 'Products',   'value' => App\Models\Product::count(),  'icon' => 'bi-box-seam-fill',  'bg' => 'linear-gradient(135deg,#4f46e5,#7c3aed)'],
            ['label' => 'Categories', 'value' => App\Models\Category::count(), 'icon' => 'bi-tags-fill',       'bg' => 'linear-gradient(135deg,#0ea5e9,#0284c7)'],
            ['label' => 'Brands',     'value' => App\Models\Brand::count(),    'icon' => 'bi-award-fill',      'bg' => 'linear-gradient(135deg,#f59e0b,#d97706)'],
            ['label' => 'Properties', 'value' => App\Models\Property::count(), 'icon' => 'bi-sliders',         'bg' => 'linear-gradient(135deg,#10b981,#059669)'],
        ];
    @endphp

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card" style="background: {{ $stat['bg'] }}">
                    <i class="bi {{ $stat['icon'] }} stat-icon"></i>
                    <div class="stat-value">{{ $stat['value'] }}</div>
                    <div class="stat-label">{{ $stat['label'] }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-box-seam-fill me-2" style="color:var(--primary)"></i>Recent Products</span>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(App\Models\Product::with('brand')->latest()->take(5)->get() as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if($product->is_active)
                                            <span class="badge-active">Active</span>
                                        @else
                                            <span class="badge-inactive">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-3">No products yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-tags-fill me-2" style="color:var(--primary)"></i>Recent Categories</span>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(App\Models\Category::with('parent')->latest()->take(5)->get() as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-muted">{{ $category->parent?->name ?? '—' }}</td>
                                    <td>
                                        @if($category->is_active)
                                            <span class="badge-active">Active</span>
                                        @else
                                            <span class="badge-inactive">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center text-muted py-3">No categories yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
