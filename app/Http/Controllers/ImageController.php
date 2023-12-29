<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class ImageController extends Controller
{
     public function index(){
        return view('upload-image');
    }
    public function store(Request $request){
        $request->validate([
        'images.*'=> 'required|mimes:jpg,png,jpeg|max:12300',
        ]);
        if($request->images){
            foreach ($request->images as $image) {
                $modifiedImage=time().'-'.$image->getClientOriginalName();
                $image->move(public_path('/productimages'),$modifiedImage);
                Image::create([
                    'name'=>$modifiedImage,
                ]);
            }
        }
        if(count($request->images)==1){
        return back()->with('success','image uploaded successfully!!');
        }else
        return back()->with('success','images uploaded successfully!!');
    }
}
