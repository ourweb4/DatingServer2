<?php
/*
* File Name:  AuthController.php
* Created on 3/21/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Validation\ValidationException;

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



        $token = $user->createToken('ourweb997')->plainTextToken;

        $res = [
            'user'  => $user,
            'token' => $token
        ];
        return response($res,201);

    }

    public function Logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout'
        ]);
    }


}
