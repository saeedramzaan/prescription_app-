<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Item_details;
use App\Models\Item_masters;
use App\Models\Prescription;

class PatientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
       
    }

    public function index()
    {

        $patients = Prescription::all();

        return view('index', compact('patients'));

    }

    public function patientView(){

       return view('indexPatient');
    }



    public function indexInfo(){

        $patients = item_masters::all();

        return json_encode(array('data' => $patients));
    }

    

    public function prescriptionInfo()
    {
        $patients = prescription::where('status','Pending')->get();

        return json_encode(array('data' => $patients));
    }

    public function infoIndex()
    {

       $patients = patient::all();

       return json_encode(array('data' => $patients));
    }

    public function productInfo()
    {

       $products = Product::all();

       return json_encode(array('data' => $products));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPatient');
    }

    public function getArray()
    {

    }

    public function postSearch(Request $request)
    {

        $data = $request->title;

        $userData = patient::where('name', 'LIKE', '%' . $data . '%')
        ->orWhere('email', 'LIKE', '%' . $data . '%')->orWhere('address', 'LIKE', '%' . $data . '%')->orWhere('mobile_no', 'LIKE', '%' . $data . '%')->orWhere('date', 'LIKE', '%' . $data . '%')->orWhere('time', 'LIKE', '%' . $data . '%')->get();

        return json_encode(array('data' => $userData));
    }

   
    public function search(Request $request)
    {

   
        $data = $request->name;

        $userData = Product::where('drug_name', 'LIKE', '%' . $data . '%')->get();

        return json_encode(array('data' => $userData));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
