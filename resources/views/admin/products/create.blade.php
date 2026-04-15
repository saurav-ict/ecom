@extends('admin.layout')

@section('title', 'New Product')
@section('page-title', 'New Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none" style="color:var(--primary)">Products</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')
        <div class="d-flex gap-2 mt-2 mb-4">
            <button class="btn btn-primary px-4">Create Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
        </div>
    </form>
@endsection
