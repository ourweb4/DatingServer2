<?php
/*
* File Name:  PoliticsController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\politics;

class PoliticsController extends Controller
{

    public function index()
    {
        //
        $recs = politics::all();

        return response()->json($recs);

    }

}
