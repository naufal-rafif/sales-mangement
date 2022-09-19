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
                                <h2>Manajemen Cabang</h2>
                            </div>
                            <div class="m-3">
                                <a class="btn btn-outline-success" href="{{ route('supervisor.branch.create') }}">+ Add New branch</a>
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
                            <th width="280px">Action</th>
                        </tr>
                        <?php $no = 1 ;?>
                        @foreach ($branches as $branch)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $branch->branch }}</td>
                            <td class="text-center">
                                <form action="{{ route('supervisor.branch.destroy',$branch->id) }}" method="POST">
                   
                                    <a class="btn btn-outline-info d-none" href="{{ route('supervisor.branch.show',$branch->id) }}"><i class="bx bx-show"></i></a>
                    
                                    <a class="btn btn-outline-warning" href="{{ route('supervisor.branch.edit',$branch->id) }}"><i class="bx bx-pencil"></i></a>
                   
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