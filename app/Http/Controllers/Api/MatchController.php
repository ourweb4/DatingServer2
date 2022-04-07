<?php
/*
* File Name:  MatchController.php
* Created on 4/2/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Ourweb\Filter;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        //
        $gender = $request->gender;
        $zip = $request->zipcode;
        $mile = $request->mile;
        $min= $request->minage;
        $max = $request->maxage;
        $filter = new Filter($mile,$zip,$gender,$min,$max);
        $recs = $filter->run();
        return response()->json($recs);

    }

}
