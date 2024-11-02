@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Sub Category | Admin
@endsection
@section('adminlayout')

    <h3>Manage Sub Category Product Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Sub Category List</h5>
                </div>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($subcategories as $subcat)
                                <tr>
                                    <td>{{ $subcat->id }}</td>
                                    <td>{{ $subcat->category->category_name }}</td> <!-- Updated to access category name -->
                                    <td>{{ $subcat->subcategory_name }}</td>
                                    <td>
                                        <a href="{{ route('show.subcat', $subcat->id) }}" class="btn btn-info">Edit</a>
                                        
                                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subcat->id }}').submit();">Delete</a>

                                        <form id="delete-form-{{ $subcat->id }}" action="{{ route('delete.subcat', $subcat->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

