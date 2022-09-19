@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if(Auth::user()->active != 0)
                    <div class=”panel-heading”>Reseller User</div>
                    @else
                    <div>Mohon tunggu proses aktivasi dalam 2x24 jam</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection