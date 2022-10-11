<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class FourAdvertisementController extends Controller
{
    public function index()
    {
        $images = HelloWorld::where('banner_type', 'four')->get();
        return view('helloworld::admin.four-advertisement', ['images'=> $images]);
    }

    public function addImage()
    {
        return view('helloworld::admin.add-images.fourImages');
    }

    public function storeFourImage(Request $request)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'banner_title' => 'required',
            'image' => 'required',
            'banner_type' => 'required',
            'banner_hyperlink' => 'required',
        ]);

        // dd($attributes);

        $image = HelloWorld::create($attributes);
        if($image){
            return redirect()->route('helloworld.admin.four-advertisement');
        }else{
            return back();
        } 
    }
}