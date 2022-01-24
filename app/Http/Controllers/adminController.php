<?php
/*
* File Name:  adminController.php
* Created on 1/19/2022
* (c) 2022 Bill Banks
*/

namespace App\Http\Controllers;
use App\Models;

class adminController extends Controller
{
    public function index()
    {
       $recs = [ [
           "db" => "user",
           "count" => Models\User::count()
       ],
//           [
//               "db" => "children",
//               "count" => Models\children::count()
//
//           ] ,
           [
            "db" =>"Dateability Deets",
             "count" => Models\dateabilitydeets::all()->count(),
               ],
           [
           "db" => "Education",
            "count"  => Models\education::count()
           ],
           [
          "db" => "Gender",
          "count" => Models\gender::count()
               ],
           [
            "db" =>"Interests",
        "count"   => Models\interests::count()
               ],
           [
           "db" => "Politics" ,
      "count"     => Models\politics::count()
               ],
           [
           "db" => "Pronouns",
           "count"=> Models\pronouns::all()->count()
               ],
           [
           "db" =>"Religion",
         "count"  => Models\religion::count()
               ],
           [
        "db" =>   "User_profile",
     "count"   => Models\user_profile::count()
               ],
       ];
       return view("admin.admin", compact("recs"));
    }
}
