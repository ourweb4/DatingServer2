 <?php
/*
* File Name: children.blade.php
* Created on 1/4/2022
* (c)2022 Bill Banks
*/
     ?>
 @extends('layouts.database_master')
 @section('main')
     <div class="col">
         <div class="row justify-content-center">

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Zip</div>
            <div class="card-body">
            <form method="post" action="{{url('zip')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Zip</label>
                    <input type="text" name="zip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mile</label>
                    <input type="text" name="mile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
     </div>
 @endsection
