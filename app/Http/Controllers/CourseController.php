<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Skill;

class CourseController extends Controller
{
    /**  
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $breadcrumb = array('/courses'=>'Main Courses','/addnewcourse'=>'Add New Course');
     protected $listing = array('/addnewcourse'=>'Add New Course');

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $courseDetails = Course::orderBy('id', 'desc')
                        ->paginate($this->rowPerPage);
      return view('admin.course.index')->with('page_title','Main Courses')
      ->with('courseDetails',$courseDetails)
      ->with('listing',$this->listing)
      ->with('breadcrumb',$this->breadcrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumb = array();
      return view('admin.course.create')
                  ->with('page_title','Courses')
                  ->with('breadcrumb',$this->breadcrumb)
                  ->with('listing',$this->listing);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $courseDetails = new Course;
      $courseDetails->name     =   $request->name;
      $courseDetails->save();
      $request->session()->flash('alert-success', trans('message.courseaddsuccessfully'));
      return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id=  \App\Helpers\Common::decodeParam($id);
      $breadcrumb = array();
      $pincode=array();
      $courseDetails = Course::whereId($id)
                      ->first();
      return view('admin.course.edit')->with('page_title','Courses')
          ->with('courseDetails',$courseDetails)
          ->with('listing',$this->listing)
          ->with('breadcrumb',$this->breadcrumb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->id;
      if(!empty($id)) {
          $courseDetails = Course::find($id);
          $courseDetails->name = $request->name;
          $courseDetails->save();
          $request->session()->flash('alert-success', trans('message.courseupdatesuccessfully'));
          return redirect('courses');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
