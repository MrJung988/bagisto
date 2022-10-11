<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class OneAdvertisementController extends Controller
{
    public function index()
    {
        $images = HelloWorld::where('banner_type', 'one')->get();
        return view('helloworld::admin.one-advertisement', ['images'=> $images]);
    }

    public function addImage()
    {
        return view('helloworld::admin.add-images.oneImage');
    }

    public function storeOneImage(Request $request)
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
            return redirect()->route('helloworld.admin.one-advertisement');
        }else{
            return back();
        }

    }

    public function editImage($id)
    {
        $values = HelloWorld:: find($id);
        return view('helloworld::admin.edit-images.oneImage', ['values'=> $values]);
    }

    public function updateImage(Request $request, $id){
        $values = HelloWorld:: find($id);
            $values-> banner_title = $request->banner_title;
            $values-> image = $request->image;
            $values-> banner_type = $request->banner_type;
            $values-> banner_hyperlink = $request->banner_hyperlink;
            $values-> save();

            return redirect()->route('helloworld.admin.one-advertisement');
    }

    public function deleteImage($id){
        HelloWorld:: destroy($id);
        return redirect()->route('helloworld.admin.one-advertisement');
    }
}