
@extends('layouts.master')

@section('maint')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="{{url('match')}}" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                <select name="gender" class="form-select" aria-label="Default select example">

                                    @foreach($recs as $rec)
                                        <option value="{{$rec->id}}" >{{$rec->description}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Zip</label>

                                <input type="text" name="zipcode" class="form-control" id="exampleFormControlInput1" >
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Miles</label>

                                <input type="text" name="miles" class="form-control" id="exampleFormControlInput1" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Min age</label>

                                <input type="text" name="minage" class="form-control" id="exampleFormControlInput1" >
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Max age</label>

                                <input type="text" name="maxage" class="form-control" id="exampleFormControlInput1" >
                            </div>
                        </div>

                </div>
                        <button type="submit" class="btn btn-primary">Find</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
