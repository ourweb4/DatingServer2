<?php
/*
* File Name:  ChildrenController.php
* Created on 3/19/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index()
    {
        //
        $recs = children::all();
        return response()->json($recs);
    }

}
