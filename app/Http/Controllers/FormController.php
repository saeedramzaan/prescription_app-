<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Prescription;
use App\Models\Item_details;
use App\Models\Item_masters;
use Illuminate\Support\Facades\Session;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home');
    }

    public function showImage(){
        $pres_id = session()->get('pres_id');
        
        $userData = Prescription::where("id",$pres_id)->get();

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

        $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }
         
        

         $string_img = implode(",", $data);

       //  return $new; 

         $form= new Prescription();
         $form->img_name= $string_img;
         $form->delivery_address= $request->address;
         $form->delivery_time= $request->delivery_time;
         $form->note = $request->note;
         $form->status = 'Pending';
         $form->patient_id = auth()->user()->id;
         $form->patient_name = auth()->user()->name;
         
        
        $form->save();

        return back()->with('success', 'Data Has Been Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id; 
       
    }

    public function imgInfo()
    {

        $userData = Prescription::where("id",8)->get();

        return json_encode(array('data' => $userData));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $quo = Prescription::find($id);
        $pres_id =  session()->put('pres_id', $id);
        $patient_id =  session()->put('patient_id', $quo->patient_id);
        $patient_name =  session()->put('patient_name', $quo->patient_name);
        return view('quotation', compact('quo'));
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

    public function masterUpdate(Request $request){

        $item = item_masters::where('prescription_id',$request->id)->first();        ;
        $item->status = $request->status;
        $item->save();
        return redirect()->back()->with('message', 'Status Updated Successfully!');
    }

    public function masterInfo(){

        $masterInfo = Item_masters::where('patient_id',auth()->user()->id)->get();
    
        return json_encode(array('data' => $masterInfo));
    }

    public function clientStatus(){

        $quo = Prescription::all();
      
        return view('client_status', compact('quo'));
    }

    public function saveMaster(Request $request){
       
        $pres_id = session()->get('pres_id');
        $patient_id = session()->get('patient_id');
        $patient_name = session()->get('patient_name');

        $patients_detail = Item_details::where('prescription_id', $pres_id)->where('patient_id', $patient_id)->exists();
        
        if($patients_detail==0){

        return json_encode(array('status' => true,'message' => 'Please update the medicine'));

        }else{


        $patients = Item_masters::where('prescription_id', $pres_id)->where('patient_id', $patient_id)->exists();    

        if($patients==1){

         return json_encode(array('status' => true,'message' => 'This record has been already added'));

        }else{

            $item = Prescription::where('id',$pres_id)->first();  
            $item->status = "Done";
            $item->save();

            $item  = new Item_masters();
            $item->prescription_id = $pres_id;
            $item->patient_id = $patient_id;
            $item->patient_name = $patient_name;
            $item->discount = "null";
            $item->status = "Not Updated";
            $item->total = $request->grossTot;
   
            $item->save();

       
          $message = " Prescription ID: " . $pres_id . "/" . " Total: " . $request->grossTot;

         $details = [
             'title' => 'Appointment Details',
             'body' => $message,
             'header' => 'Content-Type: text/plain; charset=ISO-8859-1\r\n',
         ];

         \Mail::to('saeedramzaan@gmail.com')->send(new \App\Mail\sendMail($details));

         return json_encode(array('status' => true,'message' => 'Invoice has been sent to Email'));

        }
    }
    }

    public function saveItem(Request $request){

        $pres_id = session()->get('pres_id');
        $patient_id = session()->get('patient_id');
        $patient_name = session()->get('patient_name');


         $item  = new Item_Details();
         $item->prescription_id = $pres_id;
         $item->patient_id = $patient_id;
         $item->patient_name = $patient_name;
         $item->drug_name = $request->drug_name;
         $item->price = $request->price;
         $item->qty = $request->qty; 
         $item->total = $request->total;
         
        
        $item->save();

        return redirect()->back()->with('success', 'Item has been updated successfully');

    }

    public function itemInfo()
    {
        $tot = 0;
        $pres_id = session()->get('pres_id');
        $patients = Item_details::where('prescription_id',$pres_id)->get();
        
        foreach($patients as $val){
            $tot += $val['total'];
        }

        return json_encode(array('data' => $patients, 'tot' => $tot));

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
