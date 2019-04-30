<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grouping;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   protected $breadcrumb = array('/groups'=>'Groups','/addnewgroup'=>'Add New Group');
   protected $listing = array('/addnewgroup'=>'Add New Group');

   public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {
     $groupDetails = Grouping::orderBy('id', 'desc')
                       ->paginate($this->rowPerPage);
     return view('admin.group.index')->with('page_title','Groups')
     ->with('groupDetails',$groupDetails)
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
      return view('admin.group.create')
                  ->with('page_title','Groups')
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
      $groupDetails = new Grouping;
      $groupDetails->groupname     =   $request->groupname;
      $groupDetails->save();
      $request->session()->flash('alert-success', trans('message.groupaddsuccessfully'));
      return redirect('groups');
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
       $groupDetails = Grouping::whereId($id)
                       ->first();
       return view('admin.group.edit')->with('page_title','Groups')
           ->with('groupDetails',$groupDetails)
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
          $groupDetails = Grouping::find($id);
          $groupDetails->groupname = $request->groupname;
          $groupDetails->save();
          $request->session()->flash('alert-success', trans('message.groupupdatesuccessfully'));
          return redirect('groups');
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
