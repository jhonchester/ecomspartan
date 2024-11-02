@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Category | Admin
@endsection
@section('adminlayout')

    <h3>Create category Product Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Category List</h5>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->category_name}}</td>
                                        <td>
                                            <a href="{{route('show.cat', $cat->id)}}" class="btn btn-info">Edit</a>
                                            
                                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cat->id }}').submit();">Delete</a>

                                            <form id="delete-form-{{ $cat->id }}" action="{{ route('delete.cat', $cat->id) }}" method="POST" style="display: none;">
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

