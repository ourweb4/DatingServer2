<?php
/*
* File Name:  MessagesController.php
* Created on 4/3/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

//use App\Mail\NewMessage as NewMessageAlias;
use App\Models\messages;
use Illuminate\Http\Request;
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $user = user_profile::first('user_id','=',$user_id);
         $recs = messages::where('to_user_id','=',$user_id)->get();
         foreach ($recs as $rec) {
             messages::find($rec->id)->delete();
         }
         return response()->json($recs);

    }

    public function store(Request $request)
    {
        $rec = new messages();
        $rec->to_user_id = $request->to_user_id;
        $rec->from_user_id =  Auth::user()->id;
        $rec->message = $request->message;
        $rec->subject = $request->subject;
        $rec->read = false;
        $rec->save();
        $user = user_profile::first('user_id','=',$rec->to_user_id);
//        if ($user->sendmess) {
//                           Mail::alwaysTo($user->email)->send(new NewMessageAlias($rec));
//        }


        return response()->json($rec);


    }


    public function destroy( $id)
    {
        //
        $rec = messages::find($id)->get();
        $user_id = Auth::user()->id;
        if ($rec->to_user_id == $user_id) {
            $rec->delete();
            return response()->json(['message' => 'ok']);
        }

            return  response()->json(['message'=>'unauthorized',401]);



    }
}
