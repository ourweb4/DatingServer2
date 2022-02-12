<?php
/*
* File Name: profile_edit.blade.php
* Created on 1/27/2022
* (c)2022 Bill Banks
*/
?>

@extends('layouts.master')

@section('maint')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form method="post" action="{{url('userprofile/store/' . $up->id)}}" enctype="multipart/form-data">
                @csrf

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Basic Information
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container">
                                       <div  class="row">
                                           <div class="col">
                                               <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                           <input type="text" name="firstname" value="{{$up->firstname}}" class="form-control" id="exampleFormControlInput1" >
                                           </div>
                                           <div class="col">
                                               <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                               <input type="text" name="lastname" value="{{$up->lastname}}" class="form-control" id="exampleFormControlInput1" >

                                           </div>
                                       </div>
                                        <div class="row">
                                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                                            <input type="text" name="address" value="{{$up->address}}" class="form-control" id="exampleFormControlInput1" >

                                        </div>
                                        <div  class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">City</label>
                                                <input type="text" name="city" value="{{$up->city}}" class="form-control" id="exampleFormControlInput1" >
                                            </div>
                                            <div class="col">

                                                <label for="exampleFormControlInput1" class="form-label">State</label>
                                                <input type="text" name="state" value="{{$up->state}}" class="form-control" id="exampleFormControlInput1" >

                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Zip</label>
                                                <input type="text" name="zipcode" value="{{$up->zipcode}}" class="form-control" id="exampleFormControlInput1" >

                                            </div>

                                        </div>

                                        <div  class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                                                <input type="text" name="instagram_utl" value="{{$up->instagram_utl}}" class="form-control" id="exampleFormControlInput1" >
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                                                <input type="text" name="facebook_url" value="{{$up->facebook_url}}" class="form-control" id="exampleFormControlInput1" >
                                            </div>

                                            </div>

                                        </div>

                                        <div  class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                                <input type="text" name="phonenumber" value="{{$up->phonenumber}}" class="form-control" id="exampleFormControlInput1" >
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                <input type="text" name="email" value="{{$up->email}}" class="form-control" id="exampleFormControlInput1" >
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">DOB</label>
                                                <div class='input-group date' id='CalendarDateTime'>
                                                    <input type="text" name="dob" value="{{$up->dob}}" class="form-control"  >

                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Vaccine</label>
                                                <input type="checkbox" name="vaccine" value="{{$up->vaccine}}" >
                                            </div>
                                        </div>


                                        <div  class="row">
                                            <div class="col">
                                              <img src="{{$up->profilepicture}}">
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Profile Pic</label>
                                                <input type="file" name="profilepic">
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                More Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                            <select name="gender_id" class="form-select" aria-label="Default select example">

                                               @foreach($gender as $rec)
                                                  <option value="{{$rec->id}}" @if($up->gender_id == $rec->id)  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Politics</label>
                                            <select name="politics_id" class="form-select" aria-label="Default select example">

                                                @foreach($politics as $rec)
                                                    <option value="{{$rec->id}}" @if($up->politics_id == $rec->id)  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Education</label>
                                            <select name="education_id" class="form-select" aria-label="Default select example">

                                                @foreach($education as $rec)
                                                    <option value="{{$rec->id}}" @if($up->education_id == $rec->id)  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Religion</label>
                                            <select name="religion_id" class="form-select" aria-label="Default select example">

                                                @foreach($religion as $rec)
                                                    <option value="{{$rec->id}}" @if($up->religion_id == $rec->id)  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Children</label>
                                            <select name="children_id" class="form-select" aria-label="Default select example">

                                                @foreach($children as $rec)
                                                    <option value="{{$rec->id}}" @if($up->children_id == $rec->id)  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Interests</label>
                                            <select name="interests[]" multiple size="10" class="form-select" aria-label="Default select example">

                                                @foreach($interests as $rec)
                                                    <option value="{{$rec->id}}" @if(In_list($interests_list,$rec->id,1))  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Dateabilitydeets</label>
                                            <select name="dateabilitydeets[]" multiple size="10" class="form-select" aria-label="Default select example">

                                                @foreach($dateabilitydeets as $rec)
                                                    <option value="{{$rec->id}}" @if(In_list($dateabilitydeets_list,$rec->id,2))  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Pronouns</label>
                                            <select name="pronouns[]" multiple size="10" class="form-select" aria-label="Default select example">

                                                @foreach($pronouns as $rec)
                                                    <option value="{{$rec->id}}" @if(In_list($pronouns_list,$rec->id,3))  selected @endif >{{$rec->description}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                My Options
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="container">
`
                                </div>
                            </div>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary">Save</button>


                </form>

            </div>
        </div>
    </div>
@endsection

