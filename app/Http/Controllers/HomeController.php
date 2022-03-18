<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $up = user_profile::where('user_id',$id)->first();
        //  echo  $up;
        //   die();
        if (empty( $up)) {
            return redirect('/userprofile/' . $id);

        }


            return view('home');
    }
}
