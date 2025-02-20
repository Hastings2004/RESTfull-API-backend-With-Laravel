<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public static function middleware(): array{
        return [
            //new Middleware('auth', only: ['store', 'edit','update']),
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
        return Course::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $field = $request->validate([
            //'student_id'=> 'required|alpha_num',
            'level'=> 'required|numeric',
            'course_code'=> 'required|alpha_num',
            'course_name'=> 'required',
        ]);

        $course = $request->user()->courses()->create($field);

        return ["courses" => $course, "user" => $course -> user];
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        return ["courses" => $course, "user" => $course -> user];;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        Gate::authorize("modify", $course);
        $field = $request->validate([
            //'student_id'=> 'required|alpha_num',
            'level'=> 'required|numeric',
            'course_code'=> 'required|alpha_num',
            'course_name'=> 'required',
        ]);

        
        $course -> update($field);

        return  [
            'message'=> 'update successfully',
            'data'=> $course,
            "user" => $course -> user
        ];
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        Gate::authorize("modify", $course);
        $course->delete();

        return [
            'message'=> 'delete successfully'
        ];
    }
}
