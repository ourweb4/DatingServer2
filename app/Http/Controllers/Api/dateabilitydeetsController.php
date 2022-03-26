<?php
/*
* File Name:  dateabilitydeetsController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\dateabilitydeets;

class dateabilitydeetsController extends Controller
{
    public function index()
    {
        //
        $recs = dateabilitydeets::all();

        return response()->json($recs);

    }
}
