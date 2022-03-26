<?php
/*
* File Name:  EducationController.php
* Created on 3/24/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\education;

class EducationController extends Controller
{
    public function index()
    {
        //
        $recs = education::all();

        return response()->json($recs);

    }

}
