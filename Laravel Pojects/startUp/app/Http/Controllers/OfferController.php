<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $currentName = LaravelLocalization::getCurrentLocale() == 'ar' ? 'name' : 'latinName' ;
        $offers = Offer::select('price', $currentName)->get();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // protected function errorMessages(){
    //     return   ['name.required'=>__('messages.reuired')]; 
    // }
    //public function store(Request $request)
    public function store(OfferRequest $request)

    {
        //return $request;
        //
        //  Offer::create($request->all());
        //   $rules=[
        //     'name'=>'required|max:100|unique:Offers,name',
        //     'price'=>'required|numeric'
        //   ];
        // $mesages=['name.required'=>'الحقل مطلوب'];
        //  $messages=$this->errorMessages();
        //  $validate= Validator::make($request->all(),$rules,$messages);
        //   if($validate->fails())
        //   //return $validate->errors()->first();
        //   return redirect()->back()->withErrors($validate)->withInput($request->all());

        Offer::create(['name' => $request->name, 'latinName' => $request->latinName, 'price' => $request->price]);
        return redirect()->back()->with(['success' => 'offer added sucessfuly']);
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
