 <?php
/*
* File Name: user.blade.php
* Created on 4/6/2022
* (c)2022 Bill Banks
*/
     ?>
 @extends('layouts.database_master')
 @section('main')
     <div class="col">
         <div class="row justify-content-center">
             <div class="col-md-8">



             <div class="card">
        <div class="card-header">user</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recs as $rec)
            <tr>

                <td>{{$rec->user_id}}</td>
                <td>{{$rec->firstname}} {{$rec->lastname}} </td>
                <td>{{$rec->email}}</td>
                <td>
                    @if($rec->active)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td><a href="{{url('userprofile/'. $rec->user_id)}}" class="btn btn-info">View</a>
                <a href="{{url('/usersystem/'. $rec->user_id)}}" class="btn btn-danger">Toddle</a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
{{$recs->links()}}
    </div>
</div>

             <div class="col-md-4">
                 <div class="card">
                     <div class="card-body">
                         <form method="post" action="{{url('/usersystem')}}">
                             @csrf
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Email</label>
                                 <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                             </div>


                             <button type="submit" class="btn btn-primary">Search</button>
                         </form>
                     </div>
                 </div>
             </div>

     </div>
 @endsection
