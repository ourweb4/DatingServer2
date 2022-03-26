<?php
/*
* File Name:  InterestsController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\interests;

class InterestsController extends Controller
{


    public function index()
    {
        //
        $recs = interests::all();

        return response()->json($recs);

    }

}
