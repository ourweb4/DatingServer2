<?php
/*
* File Name:  InterestsListsController.php
* Created on 3/26/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prounouns_list;
use Illuminate\Support\Facades\Auth;

class ProunounsListsController extends Controller
{
    public function store($id)
    {
        //
        $user_id = Auth::user()->id;
        $recs =    Prounouns_list::create([
                'pronouns_id' => $id,
                'user_id' => $user_id

        ]);

        return response()->json($recs);

    }

    public function index()
    {
        //

        $user_id = Auth::user()->id;
        $recs =     Prounouns_list::where('user_id','='.$user_id)->all();

        return response()->json($recs);
    }


    public function destroy()
    {
        //
        $user_id = Auth::user()->id;
        Prounouns_list::where('user_id','='.$user_id)->delete();
        return response()->json([
            'message' => 'List has  been remove'
        ]);
    }

}

