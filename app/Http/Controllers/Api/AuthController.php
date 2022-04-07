<?php
/*
* File Name:  AuthController.php
* Created on 3/21/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function Register(Request $request) {
        $fields = $request->validate([
           'name'  => 'required|string',
            'email' => 'required|string|unique:users,email',
            "password" => 'required|string|min:6'

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $id = $user->id;
        $up = user_profile::create([
             'user_id' => $id,
            'active' => true,
            'email' => $fields['email']
        ]);

        log::channel('user')->info('User Created ',[
            'id' => $id,
            'email' => $user->email
        ]);


        $token = $user->createToken('ourweb997')->plainTextToken;

        $res = [
          'user'  => $user,
          'token' => $token
        ];
        return response($res,201);

    }


    public function Forgot(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',

        ]);

        $status = Password::sendResetLink($fields['email']);
        if ($status == Password::RESET_LINK_SENT) {
            return response([
                'status' => __($status)
            ]);

        }
        throw ValidationException::withMessages([
            'email' => [trans($status)]
        ]);
    }

        public function Login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            "password" => 'required|string|min:6'

        ]);

        $user = User::where('email',$fields['email'])->first();
    if (empty($user) || !Hash::check($fields['password'],$user->password)) {
        return response([
            'message' => 'Bad Login'
        ],401);
    }

    $up = user_profile::where('user_id','=',$user->id)->first();
    if (!$up->active) {
        return response([
            'message' => 'User  block'
        ],403);

    }
            log::channel('user')->info('User Login ',[
                'id' => $user->id,
                'email' => $user->email
            ]);
        $token = $user->createToken('ourweb997')->plainTextToken;

        $res = [
            'user'  => $user,
            'token' => $token
        ];
        return response($res,201);

    }

    public function Logout(Request $request) {
        auth()->user()->tokens()->delete();
        $user = auth()->user();

        log::channel('user')->info('User Logout ',[
            'id' => $user->id,
            'email' => $user->email
        ]);

        return response([
            'message' => 'Logout'
        ]);
    }


}
