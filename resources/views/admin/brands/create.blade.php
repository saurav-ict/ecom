@extends('admin.layout')

@section('title', 'New Brand')
@section('page-title', 'New Brand')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}" class="text-decoration-none" style="color:var(--primary)">Brands</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2" style="color:var(--primary)"></i>Create Brand
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.brands._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Create</button>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
