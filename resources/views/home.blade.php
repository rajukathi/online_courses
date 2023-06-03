@extends('layouts.web')
@section('content')
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-10 margin-tb">
            <center>
                <h2>Welcome to Dashboard</h2>
                <h4>{{ Auth::user()->name }}</h4>
                @if( auth()->user()->role == "user" )
                    <h4>You can explore verity of courses and learn new thing. You just need to enroll perticular courses.</h4>
                @elseif( auth()->user()->role == "instructor" )
                    <h4>You can create, manage and see enrollment student in cources.</h4>

                @endif
            </center>
        </div>
    </div>
    @if( auth()->user()->role == "user" )
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/courses.png') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('courses.index') }}">Courses</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($courses) ? $courses->count() : 0 }} available courses<span class="text2"> out of {{ !empty($enrollment) ? $enrollment->count() : 0 }} enrolled</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="margin-top:10px;">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/enrollment.jpg') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('enroll.index') }}">Enrollment</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($enrollment) ? $enrollment->count() : 0 }} student Enrolled <span class="text2">out of {{ !empty($courses) ? $courses->count() : 0 }} available courses</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif( auth()->user()->role == "instructor" )
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/courses.png') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('courses.index') }}">Courses</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($courses) ? $courses->count() : 0 }} available courses<span class="text2"> out of {{ !empty($enrollment) ? $enrollment->count() : 0 }} enrolled</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="margin-top:10px;">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/enrollment.jpg') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('enroll.index') }}">Enrollment</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($enrollment) ? $enrollment->count() : 0 }} student Enrolled <span class="text2">out of {{ !empty($courses) ? $courses->count() : 0 }} available courses</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif( auth()->user()->role == "admin" )
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/courses.png') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('courses.index') }}">Courses</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($courses) ? $courses->count() : 0 }} available courses<span class="text2"> out of {{ !empty($enrollment) ? $enrollment->count() : 0 }} enrolled</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="margin-top:10px;">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/enrollment.jpg') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('enroll.index') }}">Enrollment</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">{{ !empty($courses) ? $courses->pluck('title')->implode(',') : "No Courses for enrollment" }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($enrollment) ? $enrollment->count() : 0 }} student Enrolled <span class="text2">out of {{ !empty($courses) ? $courses->count() : 0 }} available courses</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon" style="margin-left: 36%;margin-top: 2%;"> <img height="150px" width="150px" src="{{ asset('storage/images/users.png') }}"> </div>
                            <div class="ms-2 c-details">
                                <h3 class="mb-0" style="text-align: center;"><a href="{{ route('users.index') }}">Users</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 style="margin-left:2%;" class="heading">Instructor Users : {{ !empty($users) ? $users->where('role','instructor')->count() : 0 }}</h3>
                        <h3 style="margin-left:2%;" class="heading">Student Users : {{ !empty($users) ? $users->where('role','user')->count() : 0 }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-3" style="margin-left:2%;"> <span class="text1">{{ !empty($enrollment) ? $enrollment->count() : 0 }} Enrolled <span class="text2">out of {{ !empty($users) ? $users->count()-1 : 0 }} available users</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection