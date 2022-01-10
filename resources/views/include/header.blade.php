<?php
/*
* File Name: header.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DateabilityApp.com</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/public-assets-app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendorlibs-datatable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendorlibs-photoswipe.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendorlibs-smartwizard.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom*.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/messenger*.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/login-register*.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
