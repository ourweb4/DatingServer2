<?php
/*
* File Name:  ReligionsController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\religion;

class ReligionsController extends Controller
{

    public function index()
    {
        //
        $recs = religion::all();
        return response()->json($recs);
    }

}
