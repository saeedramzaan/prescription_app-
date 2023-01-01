<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\patient;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

  
        if(auth()->user()->type=="pharmacist"){
            return view('index');
        }else{
          
            return view('home');
            // $patients = patient::all();

            // return json_encode(array('data' => $patients));
        }
    }
}
