<?php
/*
* File Name:  UserSystemController.php
* Created on 4/6/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\user_profile;
use App\Models\User;

use Illuminate\Http\Request;


class UserSystemController extends Controller
{
    public function index()
    {
        //
        $recs = user_profile::orderBy('email')->paginate(25);
        return view('user.user',compact('recs'));
    }

    public function search(Request $request)
    {
        $email = $request->email;
        $recs = user_profile::all()->where('email','=',$email);

        return view('user.user',compact('recs'));
    }

    public function toddle($id)
    {
        $recs = user_profile::where('user_id','=',$id)->first();
        $recs->active = ! $recs->active;
        $recs->save();
        return redirect()->back();

    }
}
