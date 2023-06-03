<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $enrollment = Enroll::with(['user','course'])->orderBy('created_at','desc')->paginate(5);
        return view('enrollment.index', compact('enrollment'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store($id)
    {
        request()->merge([
            'user_id' => auth()->user()->id,
            'course_id' => $id,
        ]);
        Enroll::create(request()->all());
        return redirect()->route('enroll.index')->with('success','Selected course has been enrolled successfully.');
    }

}

