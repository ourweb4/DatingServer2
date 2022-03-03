 <?php
/*
* File Name: photo.blade.php
* Created on 2/18/2022
* (c)2022 Bill Banks
*/
     ?>
 @extends('layouts.database_master')
 @section('main')
 <div class="col">
     <div class="row justify-content-center">
         <div class="col-md-8">

         <div class="card">
        <div class="card-header">Photos</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recs as $rec)
            <tr>

                <td><img src="{{asset($rec->filename)}}"></td>
                <td>{{$rec->title}} </td>
                <td>
                <a href="{{url('photo/destroy/'. $rec->id)}}" class="btn btn-danger">Delete</a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
         </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add Photo</div>
            <div class="card-body">
            <form method="post" action="{{url('/photo/store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleFormControlInput1" class="form-label">Pic</label>
                    <input type="file" name="pic">

                </div>


                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
 @endsection
