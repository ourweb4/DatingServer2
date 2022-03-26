<?php
/*
* File Name:  PronounsController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\pronouns;

class PronounsController extends Controller
{

    public function index()
    {
        //
        $recs = pronouns::all();
        return response()->json($recs);
    }

}
