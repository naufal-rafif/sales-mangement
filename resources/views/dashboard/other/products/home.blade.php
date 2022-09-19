@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
  
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <div class="m-3">
                                <h2>Produk</h2>
                            </div>
                            <div class="m-3">
                                <a class="btn btn-outline-success" href="{{ route('products.create') }}">+ Add New Produk</a>
                            </div>
                        </div>
                    </div>
                   
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                   
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Cabang</th>
                            <th width="280px">Action</th>
                        </tr>
                        <?php $i = 1 ;?>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="/image/{{ $product->image }}" width="100px"></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->branch }}</td>
                            <td class="text-center">
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                   
                                    <a class="btn btn-outline-info d-none" href="{{ route('products.show',$product->id) }}"><i class="bx bx-show"></i></a>
                    
                                    <a class="btn btn-outline-warning" href="{{ route('products.edit',$product->id) }}"><i class="bx bx-pencil"></i></a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection