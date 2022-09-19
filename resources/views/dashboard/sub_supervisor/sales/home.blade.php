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
                                <h2>Manajemen Penjualan</h2>
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
                            <th>Bukti Gambar</th>
                            <th>Deskripsi</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                        <?php $no = 1 ;?>
                        @foreach ($sales as $sale)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td><img src="/image/{{ $sale->image }}" width="100px"></td>
                            <td>{{ $sale->description }}</td>
                            <td>{{ $sale->name }}</td>
                            <td>{{ $sale->qty }}</td>
                            <td>
                                <div class="d-flex justify-center">
                                    <div class="p-1">
                                        <form action="{{ route('sub_supervisor.sales.update',$sale->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <input type="hidden" value="disetujui" name="status">
                                            <button type="submit" class="btn btn-success"><i class="bx bx-check"></i> Setujui</button>
                                        </form>
                                    </div>
                                    <div class="p-1">
                                        <form action="{{ route('sub_supervisor.sales.update',$sale->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <input type="hidden" value="ditolak" name="status">
                                            <button type="submit" class="btn btn-danger"><i class="bx bx-x"></i> Tolak</button>
                                        </form>
                                    </div>
                                </div>
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