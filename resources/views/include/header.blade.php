<?php
/*
* File Name: header.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
//include ('lib.php');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DateabilityApp.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="container">
 <div class="row">
     <div class="col-10">
         <img class="img" src="{{asset('images/logo2.jpeg')}}">
     </div>

        <div class="col" id="nav">
            <ul>

@if (Route::has('login'))
         @auth
             <li>            <a href="{{ url('/dashboard') }}" >Dashboard</a></li>
                        <li>            <a href="{{ url('/logout') }}" >Logout</a></li>
                    @else
            <li>    <a href="{{ url('/login') }}" >Log in</a></li>

            @if (Route::has('register'))
              <li>  <a href="{{ url('/register') }}" >Register</a></li>
            @endif
       @endauth

@endif
            </ul>
        </div>
     @if(session('message'))
         <div class="row">
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>{{session('message')}}</strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         </div>
     @endif
</div>
</div>
