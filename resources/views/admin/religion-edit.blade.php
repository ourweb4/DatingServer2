<?php
/*
* File Name: religion-edit.blade.php
* Created on 1/7/2022
* (c)2022 Bill Banks
*/
@extends('layouts.master')
@section('main')
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add religion</div>
                <div class="card-body">
                    <form method="post" action="{{url('admin/religion/update/'.$rec->id )}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{$rec->description}}">
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
