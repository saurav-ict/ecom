@extends('admin.layout')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}" class="text-decoration-none" style="color:var(--primary)">Categories</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square me-2" style="color:var(--primary)"></i>Edit: {{ $category->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @csrf @method('PUT')
                        @include('admin.categories._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Update</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
