<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except('index','show','getThumbnail','getSlides');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::get();
        return response()->json([
            'cities'    => $city,
        ], 200);
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
        
        $this->validate($request, [
            'name'        => 'required|max:255',
            'description' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $city = City::create($data);
        return response()->json([
            'city'    => $city,
            'message' => 'success'
        ], 200);
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
        $city = City::find($id);
        return response()->json([
            'city'    => $city
        ], 200);
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
        $data = [
            'name' => $request->name,
            'description' => $request->description            
        ];
        $city=City::find($id)->update($data);
        return response()->json([
            'city' =>$city
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        Storage::delete('public/'.$city->thumbnail);
        if(($city->image1)!==null){
            Storage::delete('public/'.$city->image1);
        }
        if(($city->image2)!==null){
            Storage::delete('public/'.$city->image2);
        }
        if(($city->image3)!==null){
            Storage::delete('public/'.$city->image3);
        }
        $city->delete();
        return response()->json([
            'city'    => $city
        ], 200);
    }
    public function uploadThumbnail(Request $request, City $city)
    {   
        $filename=sprintf('%s.%s', $city->name, $request->thumbnail->extension());
        $path = $request->file('thumbnail')->storeAs('public/cities', $filename);
        $data = [
            'thumbnail' => 'cities/'.$filename
        ];
        City::find($city->id)->update($data);
        return response()->json([
            'thumbnail'    => $path
        ], 200);
    }
    public function getThumbnail($id)
    {   
        $city = City::find($id);
        $url = Storage::url($city->thumbnail);
        return response()->json([
            'path'    => $url
        ], 200);
    }
    public function uploadSlides(Request $request, City $city)
    {  
        $path=[];
        $data = [];
        if($request->has('slide1')){
            $filename1=sprintf('%s-Slide1.%s', $city->name, $request->slide1->extension());
            $path[0] = $request->file('slide1')->storeAs('public/cities', $filename1);
            $data['image1']='cities/'.$filename1;
        }
        if($request->has('slide2')){
            $filename2=sprintf('%s-Slide2.%s', $city->name, $request->slide2->extension());
            $path[1] = $request->file('slide2')->storeAs('public/cities', $filename2);
            $data['image2']='cities/'.$filename2;
        }
        if($request->has('slide3')){
            $filename3=sprintf('%s-Slide3.%s', $city->name, $request->slide3->extension());
            $path[2] = $request->file('slide3')->storeAs('public/cities', $filename3);
            $data['image3']='cities/'.$filename3;
        }
        
        City::find($city->id)->update($data);
        return response()->json([
            'path'    =>$data
        ], 200);
    }
    public function getSlides($id)
    {   
        $city = City::find($id);
        $url=[];
        if(($city->image1)!==null){
            $url[0]=Storage::url($city->image1);
        }
        if(($city->image2)!==null){
            $url[1]=Storage::url($city->image2);
        }
        if(($city->image3)!==null){
            $url[2]=Storage::url($city->image3);
        }
        return response()->json([
            'slides'    => $url
        ], 200);
    }
}
