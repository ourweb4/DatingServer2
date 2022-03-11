<?php
/*
* File Name: read.blade.php
* Created on 3/6/2022
* (c)2022 Bill Banks
*/

@extends('layouts.master')
@section('main')
    <div class="col">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card">
                    <div class="card-header">Message</div>
                    <div class="card-body">
                        <div class="row">
                            <h3> {{$rec->From_User()->firstname}}</h3>
                        </div>
                        <div class="row">
                            <h5> {{$rec->From_User()->Gender()}}, {{$rec->From_User()->Age()}} </h5>
                        </div>
                        <div class="row">
                            @if(empty($rec->From_User()->profilepicture))
                                <img class="img" src="{{asset('images/nopic.png')}}">
                            @else
                                <img src="{{asset($rec->From_User()->profilepicture)}}">
                            @endif
                        </div>
                        <div class="row">
                            <h5>Date: {{$rec->created_at}}</h5>
                        </div>
                        <div class="row">

                            <h5>Subject: {{$rec->subject}}</h5>
                        </div>
                        <div class="row">
                            <p>{{$rec->message}}</p>
                        </div>
                        <div class="row">
                            <a href="{{url('messages/new/'. $rec->to_user_id)}}" class="btn btn-info">Replay</a>
                            <a href="{{url('messages/destroy/'. $rec->id)}}" class="btn btn-danger">Delete</a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

@endsection
