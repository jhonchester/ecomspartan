@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Store | Admin
@endsection
@section('adminlayout')

    <h3>Manage Store Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Store List</h5>
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
                                    <th>Store Name</th>  
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{$store->id}}</td>
                                        <td>{{$store->store_name}}</td>
                                        <td>{{$store->slug}}</td>
                                        <td>{{$store->details}}</td>
                                        <td>
                                            <a href="" class="btn btn-info">Edit</a>
                                            
                                            <a href="#" class="btn btn-danger" onclick="">Delete</a>

                                            <form id="delete-form-" method="POST" style="display: none;">
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

