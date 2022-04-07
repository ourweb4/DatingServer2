<?php
/*
* File Name:  LikesController.php
* Created on 3/17/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\likes;
use Illuminate\Http\Request;
use App\Models\user_profile;

use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function index()
    {
        //\
    }

    public function new($id)
    {
        //
        $user_id = Auth::user()->id;
        $dummy = new likes();
        $dummy->to_user_id  = $id;
        $dummy->from_user_id = $user_id;
        $dummy->save();
        return  response()->json($dummy);

    }

    public function me()
    {
        //
         $recs[]=array();
        $user_id = Auth::user()->id;
        $likes = likes::where('to_user_id','=',$user_id)->get();
        foreach ($likes as $like) {
            $rec = user_profile::where('user_id',$like->from_user_id)->first();
            $recs[] = $rec;
        }
        $title = "Who likes  me";
        return  response()->json($recs);

    }

    public function who()
    {
        //

        $recs[]=array();
        $user_id = Auth::user()->id;
        $likes = likes::where('from_user_id','=',$user_id)->get();
        foreach ($likes as $like) {
            $rec = user_profile::where('user_id',$like->to_user_id)->first();
            $recs[] = $rec;
        }
        $title = "Who I like ";
    return  response()->json($recs);
   }


    public function destroy($id)
    {
        //

        $user_id = Auth::user()->id;
        $dummy =  likes::find($id)
            ->get()->first();
         if ($user_id == $dummy->from_user_id ) {
             $dummy->delete();
             return  response()->json(['message'=>'Deleted']);

         }
        return  response()->json(['message'=>'unauthorized',401]);
    }
}
