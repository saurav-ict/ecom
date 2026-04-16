@extends('admin.layout')

@section('title', 'Edit Customer')
@section('page-title', 'Edit Customer')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}" class="text-decoration-none" style="color:var(--primary)">Customer</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2" style="color:var(--primary)"></i>Edit Customer
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.customers._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Update</button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
