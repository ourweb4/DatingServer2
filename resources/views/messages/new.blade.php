<?php
/*
* File Name: new.blade.php
* Created on 3/8/2022
* (c)2022 Bill Banks
*/

@extends('layouts.master')
@section('main')
    <div class="col">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{url('message/store')}}">
                    @csrf
                    <input type="hidden" name="to_user_id" value="{{$rec->to_user_id}}}">

                    <div class="card">
                    <div class="card-header">Message</div>
                    <div class="card-body">
                        <div class="row">
                            <h3> {{$rec->To_User()->firstname}}</h3>
                        </div>
                        <div class="row">
                            <h5> {{$rec->To_User()->Gender()}}, {{$rec->To_User()->Age()}} </h5>
                        </div>
                        <div class="row">
                            @if(empty($rec->To_User()->profilepicture))
                                <img class="img" src="{{asset('images/nopic.png')}}">
                            @else
                                <img src="{{asset($rec->To_User()->profilepicture)}}">
                            @endif
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>


                                                   </div>
                        <div class="row">
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Message</label>
                             <textarea name="message" cols="50" rows="10"></textarea>


                         </div>



                                                 </div>
                        <div class="row">

                            <button type="submit" class="btn btn-primary">Send</button>                </div>

                    </div>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
    </div>

@endsection
