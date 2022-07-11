<?php
/*
* File Name:  ProunounsListsController.php
* Created on 4/26/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\interests_list;
use App\Models\Prounouns_list;
use Illuminate\Support\Facades\Auth;

class ProunounsListsController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $recs =     Prounouns_list::where('user_id','=',$user_id)->get();

        return response()->json($recs);
    }


    public function store($id)
    {
        //
        $user_id = Auth::user()->id;
        $recs =  new Prounouns_list();
        $recs->pronouns_id = $id;
        $recs->user_id = $user_id;
        $recs->save();
        return response()->json($recs);

    }

    public function show($id)
    {
         //$user_id = Auth::user()->id;
        $recs =     Prounouns_list::where('user_id','=',$id)->get();

        return response()->json($recs);
    }


    public function destroy()
    {
        //
        $user_id = Auth::user()->id;
       Prounouns_list::where('user_id','=', $user_id)->delete();
        return response()->json([
            'message' => 'List has  been remove'
        ]);
    }

}
