@extends('admin.layout')

@section('title', 'Edit Brand')
@section('page-title', 'Edit Brand')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}" class="text-decoration-none" style="color:var(--primary)">Brands</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square me-2" style="color:var(--primary)"></i>Edit: {{ $brand->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        @include('admin.brands._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Update</button>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
