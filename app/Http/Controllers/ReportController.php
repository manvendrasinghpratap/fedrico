<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Skill;
use App\Subskill;
use App\Grouping;

class ReportController extends Controller
{
    protected $breadcrumb = array('/report'=>'Report','/report'=>'Detail Report');
    protected $listing = array('/report'=>'Detail Report');
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
      $subskill = ''; $skill_name = array();
      if(isset($request->subskill) && ( $request->subskill > 0 )&&(!empty($request->subskill))){
        $subskill = $request->subskill;
        $subskillDetails = Subskill::find($subskill); $skill_name = $subskillDetails->toArray();
      }
      $getGroups = Grouping::whereStatus('1')->orderby('id')->get();
      if(count($getGroups)>0){
        $groupArray = array();
          foreach($getGroups as $groups){
            $averageColumn = ''; $skillsIds = '';   $innergroups = array();
            foreach($groups->skills as $skills){
              $skillsIds .= $skills['id'].',';
              $averageColumn .= $skills['skillname'].' /  ';
              $innergroups['skillsIds'] = rtrim($skillsIds,',');
              $innergroups['groupname'] = rtrim($groups->groupname,',');
              $innergroups['averagegroupName'] = rtrim($averageColumn,'/  ');
            }
              $groupArray[] = $innergroups;
          }
      }
      $groupArray = array_filter($groupArray);
    //  $this->p($groupArray);
    //   die();
      $getAllSubskills = Subskill::pluck('skill_name','id');
      $employeedetails = Employees::orderBy('id', 'desc')->get();
      // ALTER TABLE `skills` ADD `grouping` INT NOT NULL DEFAULT '0' AFTER `skillname`;
      //ALTER TABLE `skills` ADD `grouping_id` INT NOT NULL DEFAULT '1' AFTER `skillname`;
      $mainSkillArray = Skill::orderBy('id','desc')->pluck('skillname','id');
      /*$this->p($mainSkills); die();
      $mainSkillArray = array();
      $averageColumn = '';
      foreach($mainSkills as $skills){
        $mainSkillArray[$skills['id']] =  $skills['skillname'];
      //  $averageColumn .= $skills['skillname'].' /  ';
      }
    //  $averageColumn = rtrim($averageColumn,'/  '); // die();

*/
     //$this->p($mainSkillArray); die();
      return view('admin.report.index')
                      ->with('page_title','Report')
                      ->with('employeedetails',$employeedetails)
                      ->with('listing',$this->listing)
                      ->with('groupArray',$groupArray)
                      ->with('averageColumn',$averageColumn)
                      ->with('mainSkillArray',$mainSkillArray)
                      ->with('skill_name',$skill_name)
                      ->with('subskill',$subskill)
                      ->with('getAllSubskills',$getAllSubskills)
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
        //
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
