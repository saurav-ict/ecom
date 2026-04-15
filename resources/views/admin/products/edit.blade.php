@extends('admin.layout')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none" style="color:var(--primary)">Products</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.products._form')
        <div class="d-flex gap-2 mt-2 mb-4">
            <button class="btn btn-primary px-4">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
        </div>
    </form>
@endsection
