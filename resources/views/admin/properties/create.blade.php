@extends('admin.layout')

@section('title', 'New Property')
@section('page-title', 'New Property')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}" class="text-decoration-none" style="color:var(--primary)">Properties</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2" style="color:var(--primary)"></i>Create Property
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.properties.store') }}" method="POST">
                        @csrf
                        @include('admin.properties._form')
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary px-4">Create</button>
                            <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
