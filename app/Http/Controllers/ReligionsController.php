<?php
/*
* File Name:  ReligionsController.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\religion;
use Illuminate\Http\Request;

class ReligionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $recs = religion::all();
        return view('admin.religion', compact('recs'));
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

        $rec = new religion();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/religion');
    }

    public function show(religion $religion)
    {
        //
    }

    public function edit( $id)
    {
        $rec = religion::all()->find($id);
        return view('admin.religion-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = religion::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/religion');

    }

    public function destroy($id)
    {
        //
        $rec = religion::all()->find($id)->delete();

        return redirect('admin/religion');

    }
}
