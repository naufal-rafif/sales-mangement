@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-semibold fs-5">Manajemen Penjualan</div>
  
                <div class="card-body">
                    Selamat Datang, <b>{{Auth::user()->name}}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection