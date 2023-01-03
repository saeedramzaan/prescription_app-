<?php

namespace App\Http\Controllers;

use App\Models\time;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->day = $request->day;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('viewProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProduct');
    }

    // public function day_existed(){

    //     $day = ucfirst($this->day); 

    //     $day_exist = time::Where('day',$day)->exists();

    //     return $day_exist;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $pro = new Product();
        $pro->drug_name = $request->name;
        $pro->price = $request->price;
        $pro->qty = $request->qty;
       
        $pro->save();

        return redirect()->back()->with('success', 'Data successfully entered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('updateProduct', compact('product'));
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
       

        $patient = Product::find($id);
        $patient->drug_name = $request->drug_name;
        $patient->price = $request->price;
        $patient->qty = $request->qty;
    
        $patient->save();

        return redirect('/product')->with('success', 'Data Successfully Updated');
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

    public function delete($id)
    {
        $user = Product::find($id);
        $user->delete();
        return redirect('/product')->with('success', 'Data Successfully Deleted');
    }
}
