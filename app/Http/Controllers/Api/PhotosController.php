<?php
/*
* File Name:  PhotosController.php
* Created on 4/1/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\photos;

use Illuminate\Support\Facades\Auth;
use Image;

class PhotosController extends Controller
{
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $recs = photos::all()->where('user_id','=', $user_id);

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
            return response()->json($rec);
        } else {
            return  response()->json(['message'=>'No file uploaded'
           ] );
        }

    }

    public function show($id)
    {
        //

        $recs = photos::all()->where('user_id','=', $id);
        return response()->json($recs);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
        $rec = photos::first($id)->get();
        if (!empty($rec)) {
            if ($rec->user_id == Auth::user()->id) {
                $old_pic =$rec->filename;
                if (!empty($old_pic)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/public/' .$old_pic);
                }

                return  response()->json(['message'=>'file deleted']);

            }
        }
        return  response()->json(['message'=>'unauthorized',401]);

    }
}
