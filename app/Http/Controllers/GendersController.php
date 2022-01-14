<?php
/*
* File Name:  GendersController.php
* Created on 1/6/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\gender;
use Illuminate\Http\Request;

class GendersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $recs = gender::all();
        return view('admin.gender', compact('recs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'description' => 'required',
        ]);

        $rec = new gender();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/gender');
    }

    public function show(gender $gender)
    {
        //
    }

    public function edit( $id)
    {
        $rec = gender::all()->find($id);
        return view('admin.gender-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = gender::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/gender');

    }

    public function destroy($id)
    {
        //
        $rec = gender::all()->find($id)->delete();

        return redirect('admin/gender');

    }
}
