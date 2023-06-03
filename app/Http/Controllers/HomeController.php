<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Enroll;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $enrollment = $courses = [];

        if( auth()->user()->role == "admin" ) {

            $courses = Course::get();
            $enrollment = Enroll::get();
            $users = User::get();
        } else if( auth()->user()->role == "instructor" ) {

            $courses = Course::where('user_id', auth()->user()->id)->get();
            $enrollment = Enroll::whereIn('course_id', $courses->pluck('user_id')->toArray())->get();
        } else {

            $enrollment = Enroll::get();
            $courses = Course::get();
        }

        return view('home', compact('users','enrollment','courses'));
    }
}
