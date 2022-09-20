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
                                <a class="btn btn-primary" href="{{ route('superadmin.sales') }}"><i class="bx bx-arrow-back"></i> Back</a>
                            </div>
                            <div class="p-3 text-center">
                                <h2>Edit sales</h2>
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
                        
                        
                        <form action="{{ route('superadmin.sales.update',$sales->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Deskripsi:</strong>
                                        <textarea type="text" name="description" class="mt-1 form-control" placeholder="Description">{{$sales->description}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Banyaknya penjualan:</strong>
                                        <input type="number" name="qty" value="{{$sales->qty}}" class="mt-1 form-control" placeholder="Jumlah">
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Bukti Penjualan:</strong>
                                        <input type="file" name="image" class="form-control" placeholder="image">
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