<?php
/*
* File Name:  MatchController.php
* Created on 3/14/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;
use App\Models\user_profile;
use App\Models\gender;
use Illuminate\Http\Request;
use App\Ourweb\Filter;

class MatchController extends Controller
{
    public function index()
    {
        //
        $recs = gender::all();
        return view('match.match', compact('recs'));

    }

    public function match(Request $request)
    {
        //
        $gender = $request->gender;
        $zip = $request->zipcode;
        $mile = $request->mile;
        $min= $request->minage;
        $max = $request->maxage;
        $filter = new Filter($mile,$zip,$gender,$min,$max);
        $recs = $filter->run();
        return view('match.match._view',compact('recs'));


    }

}
