 <?php
/*
* File Name: dateabilitydeets.blade.php
* Created on 1/4/2022
* (c)2022 Bill Banks
*/
 @extends('layouts.master')
 @section('main')
<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">dateabilitydeets</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reca as $rec)
            <tr>
                <th scope="row"> </th>
                <td>{{$rec->id}}</td>
                <td>{{$rec->description}} </td>
                <td><a href="{{url('admin/dateabilitydeets/edit/'. $rec->id)}}" class="btn btn-info">Edit</a>
                <a href="{{url('admin/dateabilitydeets/destroy/'. $rec->id)}}" class="btn btn-danger">Delete</a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add dateabilitydeets</div>
            <div class="card-body">
            <form method="post" action="{{route('admin.gemder.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                @error('description')
             <span class="text-danger">{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>
 @endsection
