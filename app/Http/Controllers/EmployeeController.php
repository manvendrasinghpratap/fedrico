<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Course;

class EmployeeController extends Controller
{
  protected $breadcrumb = array('/employees'=>'Employees','/addemployee'=>'Add New Employee');
  protected $listing = array('/addemployee'=>'Add New Employee');
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employeedetails = Employees::orderBy('id', 'desc')
                      ->paginate($this->rowPerPage);
      return view('admin.employee.index')->with('page_title','Employees')
      ->with('employeedetails',$employeedetails)
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
  		$pincode=array();
      $courses = Course::pluck('name','id');
  		//$pincode = PincodeStateCityMapping::pluck('pincode','id')->toArray();
  		return view('admin.employee.create')
  				        ->with('page_title','Employees')
                  ->with('breadcrumb',$this->breadcrumb)
                  ->with('courses',$courses)
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
        $cover = $request->file('profilepic');
        if($request->file('profilepic')){
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }
        $data = $request->all(); //$this->p($data); die();
    		$empDetails = new Employees;
        $empDetails->empid                                     =   $request->empid;
        $empDetails->firstname                                     =   $request->firstname;
        $empDetails->lastname                                     =   $request->lastname;
        $empDetails->email                                     =   $request->email;
        $empDetails->country                                     =   $request->country;
        $empDetails->state                                     =   $request->state;
        $empDetails->city                                     =   $request->city;
        $empDetails->startdate                                     =   $request->startdate;
        $empDetails->enddate                                     =   $request->enddate;
        $empDetails->contactno                                     =   $request->contactno;
        $empDetails->pro                                     =   $request->pro;
        $empDetails->versus                                     =   $request->versus;
        $empDetails->description                                     =   $request->description;
        if(isset($request->courses)){
            if(count($request->courses)>0){
                $empDetails->courses                              = json_encode($request->courses);
            }
          }
        if($request->file('profilepic'))
    		    $empDetails->avatar                                     =   $cover->getFilename().'.'.$extension;
      	$empDetails->save();
            $request->session()->flash('alert-success', trans('message.bankaddedsuccess'));
            return redirect('employees');
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
      $courses = Course::pluck('name','id');
      $employeedetails = Employees::whereId($id)
                      ->first();
      return view('admin.employee.edit')->with('page_title','Employees')
          ->with('employeedetails',$employeedetails)
          ->with('listing',$this->listing)
          ->with('courses',$courses)
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
            $file_path = storage_path('app/public/'.$request->old_avatar);
            //if(file_exists($file_path))
            //  unlink($file_path);
            $cover = $request->file('profilepic');
            if(isset($cover) && !empty($cover)){
                if(file_exists($file_path))
                 unlink($file_path);
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }
          $empDetails = Employees::find($id);
          $empDetails->empid             =   $request->empid;
          $empDetails->firstname         =   $request->firstname;
          $empDetails->lastname          =   $request->lastname;
          $empDetails->email             =   $request->email;
          $empDetails->contactno         =   $request->contactno;
          $empDetails->country           =   $request->country;
          $empDetails->state             =   $request->state;
          $empDetails->city              =   $request->city;
          $empDetails->startdate         =   $request->startdate;
          $empDetails->enddate           =   $request->enddate;
          $empDetails->pro               =   $request->pro;
          $empDetails->versus            =   $request->versus;
      		$empDetails->description       =   $request->description;
          if(isset($request->courses)){
          if(count($request->courses)>0){
            $empDetails->courses                              = json_encode($request->courses);
          }
        }
          if(isset($cover) && !empty($cover)){
            $empDetails->avatar          =   $cover->getFilename().'.'.$extension;
          }
      		$empDetails->save();
          $request->session()->flash('alert-success', trans('message.bankupdatesuccess'));
          return redirect('employees');
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
