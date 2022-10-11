<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class TwoAdvertisementController extends Controller
{
    public function index()
    {
        $images = HelloWorld::where('banner_type', 'two')->get();
        return view('helloworld::admin.two-advertisement', ['images'=> $images]);
    }

    public function addImage()
    {
        return view('helloworld::admin.add-images.twoImages');
    }

    public function storeTwoImage(Request $request)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'banner_title' => 'required',
            'image' => 'required',
            'banner_type' => '',
            'banner_hyperlink' => 'required',
        ]);

        // dd($attributes);

        $image = HelloWorld::create($attributes);
        if($image){
            return redirect()->route('helloworld.admin.two-advertisement');
        }else{
            return back();
        }        
    }

    public function editImage($id)
    {
        $values = HelloWorld:: find($id);
        return view('helloworld::admin.edit-images.twoImages', ['values'=> $values]);
    }

    public function updateImage(Request $request, $id){
        $values = HelloWorld:: find($id);
            $values-> banner_title = $request->banner_title;
            $values-> image = $request->image;
            $values-> banner_type = $request->banner_type;
            $values-> banner_hyperlink = $request->banner_hyperlink;
            $values-> save();

            return redirect()->route('helloworld.admin.two-advertisement');
    }

    public function deleteImage($id){
        HelloWorld:: destroy($id);
        return redirect()->route('helloworld.admin.two-advertisement');
    }
}