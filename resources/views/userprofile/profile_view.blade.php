<?php
/*
* File Name: profile_view.blade.php
* Created on 3/13/2022
* (c)2022 Bill Banks
*/
?>

@extends('layouts.master')

@section('maint')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <h3>{{$up->firstname}}</h3>
                </div>
                <div class="row">
                    {{$up->city}}, {{$up->state}}
                </div>
                <div class="row">
                    @if(empty($up->profilepicture))
                        <img class="img" src="{{asset('images/nopic.png')}}">
                    @else
                        <img src="{{asset($up->profilepicture)}}">
                    @endif

                </div>
                <div class="row">
                    {{$up->Gender()}}, {{$up->Age()}}, {{$up->Pronouns()}} @if ($up->vaccine)
                                                                               Vaccine
                    @else
                                                                               Not Vaccine

                    @endif
                </div>

                <div class="row">{{$up->about}}</div>

            <div class="row">{{$up->height}}  {{$up->Children()}} {{$up->Education()}}</div>

                <div class="row">{{$up->Politics()}}  {{$up->occupation}} {{$up->school}}</div>

                <div class="row">
                    @foreach($up->Interests() as $rec)
                        {{$rec->description}}
                    @endforeach
                </div>

                <div class="row">
                    @foreach($up->Dateabilitydeets() as $rec)
                        {{$rec->description}}
                    @endforeach
                </div>

                <div class="row">
                    <a href="{{url('message/new/'. $up->user_id)}}" class="btn btn-info">Message</a>
                    <a href="{{url('like/new/'. $up->user_id)}}" class="btn btn-info">Like</a>
                </div>
            </div>
        </div>
    </div>
@endsection

