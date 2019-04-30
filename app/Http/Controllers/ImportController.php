<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Employees;
class ImportController extends Controller
{
  protected $breadcrumb = array('/import'=>'Import','/samplecsv'=>'Download sample of csv');
  protected $listing = array('/samplecsv'=>'Download sample of csv');
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
      return view('admin.import.index')->with('page_title','Import')
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
        //$this->p($request->all());
        $cover = $request->file('uploadcsvfile');
        //return redirect('employees');
        //return redirect('import');
        if($request->file('uploadcsvfile') && ($cover->getClientOriginalExtension()=='csv')){
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
             $fileName =  $cover->getFilename().'.'.$extension;
             $file_path = storage_path('app/public/'.$fileName);

             //die();
             $flag = 0;
      				$handle = fopen($file_path, "r");
      				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($flag!=0){
                  //$this->p($data);

                  $empDetails = new Employees;
                  $empDetails->firstname               =    $data[0];
                  $empDetails->lastname                =    $data[1];
                  $empDetails->email                   =    $data[2];
                  $empDetails->contactno               =    $data[3];
                  $empDetails->country                 =    $data[4];
                  $empDetails->state                   =    $data[5];
                  $empDetails->city                    =    $data[6];
                  $empDetails->startdate               =    $data[7];
                  $empDetails->enddate                 =    $data[8];
                  $empDetails->pro                     =    $data[9];
                  $empDetails->versus                  =    $data[10];
                  $empDetails->description             =    $data[11];
                	$empDetails->save();
                }
              $flag =1;
      				}
      				fclose($handle);
              if(file_exists($file_path))
               unlink($file_path);
               $request->session()->flash('alert-success', trans('message.successuploadcsvfile'));
               return redirect('import');
        }
        $request->session()->flash('alert-danger', trans('message.dangeruploadcsvfile'));
        return redirect('import');
        //return redirect()->back()->with('status', "Successfully assigned section");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      return view('admin.import.downloadlink')->with('page_title','Import')
      ->with('listing',$this->listing)
      ->with('breadcrumb',$this->breadcrumb);
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
