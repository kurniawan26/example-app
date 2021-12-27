@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Users</h3>
            </div>

            <div class="col-4 d-flex justify-content-end">
                <button class="btn btn-sm text-light btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" class="d-flex flex-column mb-2" style="gap: 1rem" action="{{route('dashboard.user.update', ['id' =>$user->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete</h5>
                <button type="button" class="close btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>
                    Anda yakin ingin menghapus user {{$user->name}}
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{route('dashboard.user.delete', ['id' =>$user->id])}}" method="post">
                    @csrf
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
