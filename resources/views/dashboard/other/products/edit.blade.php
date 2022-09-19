@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-lg-12 position-relative">
                            <div class="p-3 position-absolute">
                                <a class="btn btn-primary" href="{{ route('products') }}"><i class="bx bx-arrow-back"></i> Back</a>
                            </div>
                            <div class="p-3 text-center">
                                <h2>Edit product</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        
                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <input type="hidden" name="branch_id" value="{{ $product->branch_id }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Harga:</strong>
                                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Cabang:</strong>
                                        <select class="form-select mb-3" name="branch_id" aria-label="Default select example">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}" {{ $product->branch_id == $branch->id ? 'selected' : ''}}>{{$branch->branch}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Image:</strong>
                                        <input type="file" name="image" class="form-control" placeholder="image">
                                        <img src="/image/{{ $product->image }}" width="300px">
                                    </div>
                                    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection