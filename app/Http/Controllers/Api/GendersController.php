<?php
/*
* File Name:  GendersController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\gender;

class GendersController extends Controller
{

    public function index()
    {
        //
        $recs = gender::all();

        return response()->json($recs);

    }


}
