<?php

namespace ACME\HelloWorld\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use ACME\HelloWorld\Models\HelloWorld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;

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
        $attributes = $request->validate([
            'banner_title' => 'required',
            'image' => 'required',
            'banner_type' => '',
            'banner_hyperlink' => 'required',
        ]);

        
        if($request->hasFile('image')){
            $images = $request->image;
            $extension = $images->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            Image:: make($images)->save(public_path('images/advertisement_banner/FourAdsBanner/'.$filename));
        }

        $image = HelloWorld::create([
            'banner_title' => $request->banner_title,
            'image' => $filename,
            'banner_type' => $request->banner_type,
            'banner_hyperlink' => $request->banner_hyperlink,
        ]);
        if($image){
            return redirect()->route('helloworld.admin.four-advertisement');
        }else{
            return back();
        }
    }

    public function editImage($id)
    {
        $values = HelloWorld:: find($id);
        return view('helloworld::admin.edit-images.fourImages', ['values'=> $values]);
    }

    public function updateImage(Request $request, $id){
        $values = HelloWorld:: find($id);
            $values-> banner_title = $request->banner_title;
            $values-> banner_type = $request->banner_type;
            $values-> banner_hyperlink = $request->banner_hyperlink;
            if($request->hasFile('image')){
                $destination = 'images/advertisement_banner/FourAdsBanner/'.$values->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $images = $request->file('image');
                $extension = $images->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $images->move('images/advertisement_banner/FourAdsBanner/', $filename);
                $values->image = $filename;
            }
            $values-> update();
            return redirect()->route('helloworld.admin.four-advertisement');
    }

    public function deleteImage($id){
        HelloWorld:: destroy($id);
        return redirect()->route('helloworld.admin.four-advertisement');
    }
}