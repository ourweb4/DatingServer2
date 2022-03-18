@extends('layouts.master')

@section('maint')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title">
                        {{$ttle}}
                    </div>
                    <table class="table">

                        <tbody>
                        @foreach($recs as $rec)
                            <tr>
                                <td>

                                    @if(empty($rec->profilepicture))
                                        <img class="img" src="{{asset('images/nopic.png')}}">
                                    @else
                                        <img src="{{asset($rec->profilepicture)}}">
                                    @endif
                                </td>
                               <td>
                                   {{$rec->firstname}}, {{$rec->age()}}
                               </td>
                                <td>
                                    <a href="{{url('/userprofile/' . $rec->user_id)}}" class="btn btn-info">View</a>
                                </td>


                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    @endsection
