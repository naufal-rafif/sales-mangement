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
                                <a class="btn btn-primary" href="{{ route('supervisor.user') }}"><i class="bx bx-arrow-back"></i> Back</a>
                            </div>
                            <div class="p-3 text-center">
                                <h2>Add New User</h2>
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
                        
                        <form action="{{ route('supervisor.user.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="mt-1 form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="mt-1 form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Cabang:</strong>
                                        <select class="form-select mb-3" name="branch_id" aria-label="Default select example">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}" selected>{{$branch->branch}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" class="mt-1 form-control" placeholder="Password">
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