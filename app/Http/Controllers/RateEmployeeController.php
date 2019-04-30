<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Subskill;
use App\Employees;;
use App\EmployeeRatingMapping;

class RateEmployeeController extends Controller
{
    protected $breadcrumb = array('/employees'=>'Employees','/addemployee'=>'Add New Employee');
    protected $listing = array('/addemployee'=>'Add New Employee');

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request,$id)
    {
        $id=  \App\Helpers\Common::decodeParam($id);
        $skills =  skill::get();
      //  $this->p($skill); die();
        $employeedetails = Employees::find($id);
        $empRating = EmployeeRatingMapping::whereEmployee_id($id)->get();
        //$this->p($employeedetails); die();
        return view('admin.rateemployee.index')->with('page_title','Rate Employee')
        ->with('employeedetails',$employeedetails)
        ->with('listing',$this->listing)
        ->with('skills',$skills)
        ->with('breadcrumb',$this->breadcrumb);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(); //$data
        EmployeeRatingMapping::whereEmployee_id($request->employee_id)->delete();
        //$deletedRows = App\Flight::where('active', 0)->delete();
        foreach($request->skill as $skills=>$subskill){
            foreach($subskill as $subkill_id=>$rating){
              $data['skill_id'][] = $skills;
              $data['subskill_id'][] = $subkill_id;
              $data['employee_id'][] = $rating;
              //echo $skills.'=='.$subkill_id.'==='.$rating;
              $EmployeeRatingMapping  = new EmployeeRatingMapping;
              $EmployeeRatingMapping->employee_id = $request->employee_id;
              $EmployeeRatingMapping->skill_id = $skills;
              $EmployeeRatingMapping->subskill_id = $subkill_id;
              $EmployeeRatingMapping->rating = $rating;
              $EmployeeRatingMapping->save();
            }
        }
       return redirect()->route('employees');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
