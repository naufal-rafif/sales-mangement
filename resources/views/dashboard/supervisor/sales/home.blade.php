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
                            {{-- <div class="m-3">
                                <a class="btn btn-outline-success" href="{{ route('superadmin.sales.create') }}">+ Add New Penjualan</a>
                            </div> --}}
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
                            <th>Email</th>
                            <th>Bukti Gambar</th>
                            <th>Deskripsi</th>
                            <th>Nama Produk</th>
                            <th>Cabang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                        <?php $no = 1 ;?>
                        @foreach ($sales as $sale)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $sale->email }}</td>
                            <td><img src="/image/{{ $sale->image }}" width="100px"></td>
                            <td>{{ $sale->description }}</td>
                            <td>{{ $sale->name }}</td>
                            <td>{{ $sale->branch }}</td>
                            <td>{{ $sale->qty }}</td>
                            <td>
                                @if($sale->status=='disetujui')
                                    <button class="btn btn-sm btn-success" disabled><i class="bx bx-check"></i> {{ $sale->status }}</button>
                                @elseif($sale->status=='ditinjau')
                                    <button class="btn btn-sm btn-primary" disabled><i class="bx bx-timer"></i> {{ $sale->status }}</button>
                                @else
                                    <button class="btn btn-sm btn-danger" disabled><i class="bx bx-x"></i> {{ $sale->status }}</button>
                                @endif
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