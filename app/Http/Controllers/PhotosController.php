<?php
/*
* File Name:  photosController.php
* Created on 1/31/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\photos;

use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $recs = photos::all()->where('user_id','=', $user_id);
        return view('userprofile.photo' , compact('recs'));

        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //

        $pic = $request->file('pic');
        if (!empty($pic)) {
            $rec = new photos();
            $rec->user_id = Auth::user()->id;
            $rec->title = $request->title;

            $name_gen = hexdec(uniqid());
            $ext = strtoupper($pic->getClientOriginalExtension());

            $full_name =  'images/' . $name_gen . '.' . $ext;

            Image::make($pic)->resize(200, 200)->save($full_name);
            $rec->filename=$full_name;
            $rec->save();
            return  redirect()->back()->with('message','file uploaded');
        } else {
            return  redirect()->back()->with('message','No file uploaded');
        }



    }

    public function show(photos $photos)
    {
        //
    }

    public function edit(photos $photos)
    {
        //
    }

    public function update(Request $request, photos $photos)
    {
        //
    }

    public function destroy( $id)
    {
        $rec = photos::first($id)->get();
        if (!empty($rec)) {
            if ($rec->user_id == Auth::user()->id) {
                $old_pic =$rec->filename;
                if (!empty($old_pic)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/public/' .$old_pic);
                }

                return  redirect()->back()->with('message','file deleted');

            }
        }
        return  redirect()->back();

    }
}
