@extends('admin.layout')

@section('title', 'Edit Property')
@section('page-title', 'Edit Property')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}" class="text-decoration-none" style="color:var(--primary)">Properties</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square me-2" style="color:var(--primary)"></i>Edit: {{ $property->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.properties.update', $property) }}" method="POST">
                        @csrf @method('PUT')
                        @include('admin.properties._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Update</button>
                            <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
