<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $courses = Course::with(['user','enrollment'])->orderBy('id','desc')->paginate(5);
        return view('courses.index', compact('courses'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $instructors = User::where('role', 'instructor')->get()->pluck('name', 'id' );
        return view('courses.create', compact('instructors'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Course::create($request->post());

        return redirect()->route('courses.index')->with('success','Course has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Course  $Course
    * @return \Illuminate\Http\Response
    */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Course  $Course
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $course = Course::where('id', $id)->first();
        $instructors = User::where('role', 'instructor')->get()->pluck('name', 'id' );
        return view('courses.edit',compact('course', 'instructors'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\course  $course
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $course = Course::where('id', $id)->first();
        $course->fill($request->post())->save();

        return redirect()->route('courses.index')->with('success','User Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\User  $course
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        
        Course::where('id', $id)->delete();
        return redirect()->route('courses.index')->with('success','User has been deleted successfully');
    }
}

