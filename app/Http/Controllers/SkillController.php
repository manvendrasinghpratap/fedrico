<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Grouping;

class SkillController extends Controller
{
  protected $breadcrumb = array('/skills'=>'Main Skills','/addmainskill'=>'Add New Main Skill');
  protected $listing = array('/addmainskill'=>'Add New Main Skill');
  public function __construct()
  {
      $this->middleware('auth');
  }
    /** use App\Grouping;
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $skillDetails = Skill::orderBy('id', 'desc')
      ->paginate($this->rowPerPage);
      return view('admin.skill.index')->with('page_title','Main Skills')
      ->with('skillDetails',$skillDetails)
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
      $groupingArray = Grouping::whereStatus('1')->pluck('groupname','id');
      //$this->p($groupingArray); die();
  		return view('admin.skill.create')
  				        ->with('page_title','Main Skills')
                  ->with('breadcrumb',$this->breadcrumb)
                  ->with('listing',$this->listing)
                  ->with('groupingArray',$groupingArray);
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
      $skillDetails = new Skill;
      $skillDetails->skillname     =    $request->name;
      $skillDetails->grouping_id   =    $request->grouping_id;
      $skillDetails->save();
      $request->session()->flash('alert-success', trans('message.mainskillsave'));
      return redirect('skills');
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
         $id=  \App\Helpers\Common::decodeParam($id);
         $breadcrumb = array();
         $pincode=array();
         $groupingArray = Grouping::whereStatus('1')->pluck('groupname','id');
         $skillDetails = Skill::whereId($id)
                         ->first();
         return view('admin.skill.edit')->with('page_title','Main Skills')
             ->with('skillDetails',$skillDetails)
             ->with('listing',$this->listing)
             ->with('breadcrumb',$this->breadcrumb)
             ->with('groupingArray',$groupingArray);
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
          $skillDetails = Skill::find($id);
          $skillDetails->skillname = $request->name;
          $skillDetails->grouping_id = $request->grouping_id;
          $skillDetails->save();
          $request->session()->flash('alert-success', trans('message.skillupdatesuccess'));
          return redirect('skills');
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
