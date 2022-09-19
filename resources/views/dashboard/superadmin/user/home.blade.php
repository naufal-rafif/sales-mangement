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
                                <h2>Manajemen User</h2>
                            </div>
                            <div class="m-3">
                                <a class="btn btn-outline-success" href="{{ route('superadmin.user.create') }}">+ Add New User</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Cabang</th>
                            <th>Role</th>
                            <th width="280px">Action</th>
                        </tr>
                        <?php $no = 1 ;?>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->branch }}</td>
                            <td>{{ $user->type }}</td>
                            <td class="text-center">
                                <form action="{{ route('superadmin.user.destroy',$user->id) }}" method="POST">
                   
                                    <a class="btn btn-outline-info d-none" href="{{ route('superadmin.user.show',$user->id) }}"><i class="bx bx-show"></i></a>
                    
                                    <a class="btn btn-outline-warning" href="{{ route('superadmin.user.edit',$user->id) }}"><i class="bx bx-pencil"></i></a>
                   
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