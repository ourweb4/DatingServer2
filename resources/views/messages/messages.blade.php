<?php
/*
* File Name: messages.blade.php
* Created on 3/6/2022
* (c)2022 Bill Banks
*/

@extends('layouts.master')
@section('main')
    <div class="col">
        <div class="row justify-content-center">
            <div class="col-md-8">



                <div class="card">
                    <div class="card-header">Messages</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">From</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recs as $rec)
                            <tr>

                                <td>{{$rec->created_at}}</td>

                                <td>{{$rec->From_User()->firstname}} </td>
                                <td>{{$rec->subject}}</td>
                                <td><a href="{{url('messages/read/'. $rec->id)}}" class="btn btn-info">Read</a>
                                    <a href="{{url('messages/destroy/'. $rec->id)}}" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
  </div>
        </div>

@endsection
