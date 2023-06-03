@extends('layouts.web')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h3>Courses List</h3>
            </div>
            @can('manageCourse')
            <div class="pull-right">
                <a class="btn btn-success" style="margin-top: 15px;" href="{{ route('courses.create') }}"> Create Course</a>
            </div>
            @endcan
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
                        <th>Title (Enrollment)</th>
                        <th>Description</th>
                        <th>Instructor</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>
                                <span class="label label-info">{{ $course->title }}</span>
                                <span class="badge badge-success">{{$course->enrollment->count()}}</span>
                            </td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->user->name }}</td>
                            <td>{{ date('d-m-Y',strtotime($course->start_date)) }}</td>
                            <td>{{ date('d-m-Y',strtotime($course->end_date)) }}</td>
                            <td>
                                @can('manageCourse')
                                    @if( auth()->user()->role == "admin" || auth()->user()->id == $course->user_id )
                                        <form action="{{ route('courses.destroy',$course->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                @endcan
                                @can('isUser')
                                    <a class="btn btn-primary" href="{{ route('enroll.store',$course->id) }}">Enroll</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $courses->links() !!}
        </div>
    </div>
</div>
@endsection