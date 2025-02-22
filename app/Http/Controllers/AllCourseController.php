<?php

namespace App\Http\Controllers;

use App\Models\AllCourse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllCourseRequest;
use App\Http\Requests\UpdateAllCourseRequest;

class AllCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return AllCourse::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAllCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AllCourse $allCourse)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllCourseRequest $request, AllCourse $allCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllCourse $allCourse)
    {
        //
    }
}
