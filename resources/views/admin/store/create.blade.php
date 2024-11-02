@extends('admin.layouts.layout')
@section('admin_page_title')
Create New Store | Admin
@endsection
@section('adminlayout')

    <h3>Create Store Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Store</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <form action="{{route('create.store')}}" method="POST">
                        @csrf
                        <label for="store_name" class="fw-bold mb-">Give Name for Your Category</label>
                        <input type="text" class="form-control" name="store_name" placeholder="Input">

                        <label for="details" class="fw-bold mb-2 mt-3">Description of Your Store</label>
                        <textarea name="details" id="details" cols="30" rows="10" class="form-control"></textarea>

                        <label for="slug" class="fw-bold mb-2 mt-3">Slug</label>
                        <input type="text" class="form-control mb-2" name="slug" placeholder="Store">

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add New Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
