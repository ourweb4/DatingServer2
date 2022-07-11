<?php
/*
* File Name:  DateabilitydeetsListsController.php
* Created on 3/26/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dateabilitydeets_list;
use Illuminate\Support\Facades\Auth;

class DateabilitydeetsListsController extends Controller
{
    public function store($id)
    {
        //
        $user_id = Auth::user()->id;
        $recs =   new  dateabilitydeets_list();
        $recs->dateabilitydeets_id = $id;
        $recs->user_id = $user_id;
         $recs->save();

        return response()->json($recs);

    }

    public function index()
    {
        //

        $user_id = Auth::user()->id;
        $recs =     dateabilitydeets_list::where('user_id','=',$user_id)->get();

        return response()->json($recs);
    }


    public function show($id)
    {
        //

       // $user_id = Auth::user()->id;
        $recs =     dateabilitydeets_list::where('user_id','=',$id)->get();

        return response()->json($recs);
    }


    public function destroy()
    {
        //
        $user_id = Auth::user()->id;
        dateabilitydeets_list::where('user_id','=',$user_id)->delete();
        return response()->json([
            'message' => 'List has  been remove'
        ]);
    }
}

