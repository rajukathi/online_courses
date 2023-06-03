@extends('layouts.web')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h3>Enrollment List</h3>
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
                        <th>Title</th>
                        <th>Instructor</th>
                        <th>Student</th>
                        <th>Enrollment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrollment as $enroll)
                        <tr>
                            <td>{{ $enroll->course->title }}</td>
                            <td>{{ $enroll->course->user->name }}</td>
                            <td>{{ $enroll->user->name }}</td>
                            <td>{{ date('d-m-Y',strtotime($enroll->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $enrollment->links() !!}
        </div>
    </div>
</div>
@endsection