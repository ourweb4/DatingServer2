<?php
/*
* File Name:  UserProfilesController.php
* Created on 12/31/2021
* (c) 2021 Bill Banks
*/


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\children;
use App\Models\dateabilitydeets;
use App\Models\dateabilitydeets_list;
use App\Models\education;
use App\Models\gender;
use App\Models\interests;
use App\Models\interests_list;
use App\Models\politics;
use App\Models\pronouns;
use App\Models\Prounouns_list;
use App\Models\religion;
use App\Models\user_profile;
use Illuminate\Http\Request;

class UserProfilesController extends Controller
{


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(user_profile $user_profile)
    {
        //
    }

    public function edit(user_profile $user_profile)
    {
        //
    }

    public function update(Request $request, user_profile $user_profile)
    {
        //
    }

    public function destroy(user_profile $user_profile)
    {
        //
    }
}
