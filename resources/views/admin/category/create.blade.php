@extends('admin.layouts.layout')
@section('admin_page_title')
Create Category | Admin
@endsection
@section('adminlayout')
<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Include Bootstrap JS (necessary for alert dismiss functionality) -->

    <h3>Create category Product Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
                </div>
                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <form action="{{route('store.cat')}}" method="POST">
                        @csrf
                        <label for="category_name" class="fw-bold mb-2">Give Name for Your Category</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Input">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
<!-- Include Bootstrap JS (make sure to include this in your layout file) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
