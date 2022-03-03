<?php
/*
* File Name:  zipController.php
* Created on 2/28/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Ourweb\Findzips;
use Illuminate\Http\Request;


class zipController extends Controller
{
    public function index()
    {
        //
        return view('admin.zip');
    }

    public function findcodes(Request $request)
    {

        $zip = $request->zip;
        $mile = $request->mile;

        $fetch = new Findzips($mile, $zip);

        $rec = $fetch->Run();
        return view('admin.zip');


    }
}
