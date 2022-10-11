<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class ThreeAdvertisementController extends Controller
{
    public function index()
    {
        $images = HelloWorld::where('banner_type', 'three')->get();
        return view('helloworld::admin.three-advertisement', ['images'=> $images]);
    }

    public function addImage()
    {
        return view('helloworld::admin.add-images.threeImages');
    }

    public function storeThreeImage(Request $request)
    {
        // dd($request);
        $attributes = $request->validate([
            'banner_title' => 'required',
            'image' => 'required',
            'banner_type' => '',
            'banner_hyperlink' => 'required',
        ]);

        // dd($attributes);

        $image = HelloWorld::create($attributes);
        if($image){
            return redirect()->route('helloworld.admin.three-advertisement');
        }else{
            return back();
        } 
    }
}