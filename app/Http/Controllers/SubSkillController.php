<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Subskill;

class SubSkillController extends Controller
{
  protected $breadcrumb = array('/subSkills'=>'Sub Skills','/addSubskill'=>'Add New Sub Skill');
  protected $listing = array('/addSubskill'=>'Add New Sub Skill');
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
      $skillDetails = Subskill::orderBy('id', 'desc')
      ->paginate($this->rowPerPage);
      return view('admin.subskill.index')->with('page_title','Sub Skills')
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
      $skillDetails = Skill::get();
      $skillArray = $skillDetails->toArray();
  		return view('admin.subskill.create')
  				        ->with('page_title','Sub Skills')
                  ->with('breadcrumb',$this->breadcrumb)
                  ->with('listing',$this->listing)
                  ->with('skillArray',$skillArray);
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
      $skillDetails = new Subskill;
      $skillDetails->skill_name     =   $request->name;
      $skillDetails->skill_id       =   $request->skill_id;
      $skillDetails->save();
      $request->session()->flash('alert-success', trans('message.subskillsave'));
      return redirect('subSkills');
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
         $skillDetails = Skill::get();
         $skillArray = $skillDetails->toArray();
         $subskillDetails = Subskill::whereId($id)
                         ->first();
         return view('admin.subskill.edit')->with('page_title','Sub Skills')
             ->with('subskillDetails',$subskillDetails)
             ->with('listing',$this->listing)
             ->with('breadcrumb',$this->breadcrumb)
             ->with('skillArray',$skillArray);
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
          $skillDetails = Subskill::find($id);
          $skillDetails->skill_name     =   $request->name;
          $skillDetails->skill_id       =   $request->skill_id;
          $skillDetails->save();
          $request->session()->flash('alert-success', trans('message.bankupdatesuccess'));
          return redirect('subSkills');
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
