<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Illuminate\Http\Request;
use App\Employees;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $this->p(Auth::user());
            return redirect()->route('report');
        }
        $breadcrumb = array('/report'=>'Report','/employees'=>'Employees');
        return view('admin.dashboard')->with('page_title','Dashboard')->with('breadcrumb',$breadcrumb);
    }
    public function dashboard()
    {
        $totalEmployee = Employees::count();
        $breadcrumb = array('/report'=>'Report','/employees'=>'Employees');
        return view('admin.dashboard')
            ->with('page_title','Dashboard')
            ->with('breadcrumb',$breadcrumb)
            ->with('totalEmployee',$totalEmployee);
    }
    public function login(){
        //return view('user.dashboard');
    }
}
