<?php
/*
* File Name:  UserProfilesController.php
* Created on 12/31/2021
* (c) 2021 Bill Banks
*/


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\children;
use App\Models\photos;
use App\Models\dateabilitydeets;
use App\Models\dateabilitydeets_list;
use App\Models\education;
use App\Models\gender;
use App\Models\interests;
use App\Models\interests_list;
use App\Models\politics;
use App\Models\pronouns;
use App\Models\Prounouns_list;
use App\Models\religion;
use App\Models\user_profile;
use Illuminate\Http\Request;
use Image;

class UserProfilesController extends Controller
{


public function index($id)
    {
        $up = user_profile::where('user_id',$id)->first();
      //  echo  $up;
     //   die();
        if (empty( $up))
        {
            if ($id = Auth::user()->id) {
                $up = new user_profile();
                $up->user_id = $id;
                $up->email = Auth::user()->email;
                $up->save();

            }
        }
        $gender = gender::all();
        $education = education::all();
        $children = children::all();
        $politics = politics::all();
        $religion = religion::all();
        $dateabilitydeets = dateabilitydeets::all();
        $interests = interests::all();
        $pronouns = pronouns::all();

           //User options
        $mid = $id;

        $dateabilitydeets_list = dateabilitydeets_list::all()->where('user_id','=',$id);
       $interests_list = interests_list::all()->where('user_id','=',$id);
        $pronouns_list = Prounouns_list::all()->where('user_id','=',$id);
        $photos_list = photos::all()->where('user_id','=',$id);

        if (Auth::user()->id = $mid || Is_Admin()) {

            return view('userprofile.profile_edit', compact('up', 'gender',
                'education',
                'children',
                'politics',
                'religion',
                'dateabilitydeets',
                'interests',
                'pronouns',
                'dateabilitydeets_list',
                'interests_list',
                'pronouns_list'));
        } else  {
            return view('userprofile.profile_view', compact('up', 'gender',
                'education',
                'children',
                'politics',
                'religion',
                'dateabilitydeets',
                'interests',
                'pronouns',
                'dateabilitydeets_list',
                'photos_list',
                'interests_list',
                'pronouns_list'));
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request, $pid)
    {
        $valid  = $request->validate([
         //  'profilepic' =>  'sometimes|file|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);
        $up = user_profile::all()->find($pid);

        $id = $up->user_id;


        //option list
        $pronouns=$request->pronouns;
        $interests=$request->interests;
        $dateabilitydeets=$request->dateabilitydeets;
        Prounouns_list::where('user_id','=',$id)->delete();
        dateabilitydeets_list::where('user_id','=',$id)->delete();
        interests_list::where('user_id','=',$id)->delete();

        if (isset($pronouns)) {
            for ($i = 0; $i < count($pronouns); $i++) {
                $rec = new Prounouns_list();
                $rec->user_id = $id;
                $rec->pronouns_id = $pronouns[$i];
                $rec->save();
            }
        }

        if (isset($interests) ) {
            for ($i = 0; $i < count($interests); $i++) {
                $rec = new interests_list();
                $rec->user_id = $id;
                $rec->interests_id = $interests[$i];
                $rec->save();
            }
        }

        if (isset($dateabilitydeets)) {
            for ($i = 0; $i < count($dateabilitydeets); $i++) {
                $rec = new dateabilitydeets_list();
                $rec->user_id = $id;
                $rec->dateabilitydeets_id = $dateabilitydeets[$i];
                $rec->save();
            }
        }


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

       return redirect('/home');
    }

    public function show(user_profile $user_profile)
    {
        //
    }


    public function destroy(user_profile $user_profile)
    {
        //
    }
}
