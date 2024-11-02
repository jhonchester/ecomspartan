@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Attribute | Admin
@endsection
@section('adminlayout')

    <h3>Manage Attribue Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Attribute List</h5>
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
                                    <th>Attribute Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allattributes as $attribute)
                                    <tr>
                                        <td>{{$attribute->id}}</td>
                                        <td>{{$attribute->attribute_value}}</td>
                                        <td>
                                            <a href="{{route('show.attribute', $attribute->id)}}" class="btn btn-info">Edit</a>
                                            
                                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $attribute->id }}').submit();">Delete</a>

                                            <form id="delete-form-{{ $attribute->id }}" action="{{ route('delete.attribute', $attribute->id) }}" method="POST" style="display: none;">
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

