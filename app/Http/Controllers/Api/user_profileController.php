<?php
/*
* File Name:  user_profileController.php
* Created on 3/30/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;
use Image;

class user_profileController extends Controller
{
    public function index()
    {
        //
        $recs = user_profile::all();
        return response()->json($recs);
    }

    public function store(Request $request)
    {
        //
        $user_id = $request->user_id;
        if ($user_id != Auth::user()->id) {
            return response()->json([
                'message' => 'unauthorized access'
            ],401);
        }
        $up = user_profile::where('user_id', '=', $user_id)->first();
        // profilepic

        $pic = $request->file('profilepic');
        if (!empty($pic)) {
            $old_pic = $up->profilepicture;
            if (!empty($old_pic)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/' .$old_pic);
            }

            $name_gen = hexdec(uniqid());
            $ext = strtoupper($pic->getClientOriginalExtension());

            $full_name =  'images/' . $name_gen . '.' . $ext;

            Image::make($pic)->resize(200, 200)->save($full_name);
            $up->profilepicture = $full_name;
        }

        $up->gender_id=$request->gender_id;
        $up->phonenumber=$request->phonenumber;
        $up->dob=$request->dob;
        $up->instagram_utl=$request->instagram_utl;
        $up->facebook_url=$request->facebook_url;
        $up->email=$request->email;
        $up->sendmess=$request->sendmess;
        $up->city=$request->city;
        $up->state=$request->state;
        $up->zipcode=$request->zipcode;
        $up->firstname=$request->firstname;
        $up->address=$request->address;
        $up->lastname=$request->lastname;
        $up->religion_id=$request->religion_id;
        $up->children_id=$request->children_id;
        $up->education_id=$request->education_id;
        $up->about=$request->about;
        $up->height=$request->height;
        $up->occupation=$request->occupation;
        $up->politics_id=$request->politics_id;
        $up->school=$request->school;
        $up->vaccine=$request->vaccine;


        $up->save();
        return response()->json($up);


    }

    public function show($id)
    {
        //
        $recs = user_profile::where('user_id', '=', $id)->first();
        return response()->json($recs);
    }

}
