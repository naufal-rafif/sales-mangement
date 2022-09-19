@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
  
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <div class="mx-3 mb-5">
                                <h2>Persetujuan Reseller</h2>
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
                   
                                <form action="{{ route('sub_supervisor.user.update',$user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <input type="hidden" value="{{ $user->active }}" name="active">
                                    <button type="submit" class="btn btn-outline-success"><i class="bx bx-check"></i> Setujui</button>
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