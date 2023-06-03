@extends('layouts.web')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h3>Users List</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="margin-top: 15px;" href="{{ route('users.create') }}"> Create User</a>
            </div>
        </div>
        <div class="col-lg-10">
            <hr>        
        </div>            
    </div>
    <div class="row">
        <div class="col-lg-10">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection