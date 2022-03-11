<?php
/*
* File Name:  MessagesController.php
* Created on 3/3/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Mail\NewMessage;
use App\Models\messages;
use Illuminate\Http\Request;
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $user = user_profile::first('user_id','=',$user_id);
         $recs = $user->Recv_Messages();
         return view('messages.messages',compact('recs'));

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
        if ($user->sendmess) {
                           Mail::alwaysTo($user->email)->send(new NewMessage($rec));
        }


        return redirect('message');

    }

    public function new($to_user_id)
    {
        //

        $rec = new messages();
        $rec->to_user_id = $to_user_id;
        return view('messages.new',compact('rec'));

    }


    public function edit( $id)
    {
        //
    }

    public function read( $id)
    {
        //
        $rec = messages::find($id)->get();
        $rec->read = true;
        $rec->save();
        return view('messages.read', compact('rec'));
    }

    public function destroy( $id)
    {
        //
        $rec = messages::find($id)->get();
        $user_id = Auth::user()->id;
        if ($rec->to_user_id == $user_id)
            $rec->delete();

        return redirect('message');



    }
}
