<?php
/*
* File Name:  InterestsListsController.php
* Created on 3/26/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\interests_list;
use Illuminate\Support\Facades\Auth;

class InterestssListsController extends Controller
{
    public function store($id)
    {
        //
        $user_id = Auth::user()->id;
        $recs =     interests_list::create([
                'interests_id' => $id,
                'user_id' => $user_id

        ]);

        return response()->json($recs);

    }

    public function index()
    {
        //

        $user_id = Auth::user()->id;
        $recs =     interests_list::all()
            ->where('user_id','=',$user_id);

        if ($recs == null )
            $recs = [
                'message ' => "Mo data",
                'user_id' => $user_id
            ];

        return response()->json($recs);
    }

    public function show($id)
    {
        //


        //$user_id = Auth::user()->id;
        $recs =     interests_list::all()
            ->where('user_id','=', $id);

        return response()->json($recs);
    }


    public function destroy()
    {
        //
        $user_id = Auth::user()->id;
        interests_list::where('user_id','=',$user_id)->delete();
        return response()->json([
            'message' => 'List has  been remove'
        ]);
    }

}

