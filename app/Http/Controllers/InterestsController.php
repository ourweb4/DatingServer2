<?php
/*
* File Name:  InterestsController.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\interests;
use Illuminate\Http\Request;

class InterestsController extends Controller
{

    public function index()
    {
        //
        $recs = interests::all();
        return view('admin.interests', compact('recs'));
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

        $rec = new interests();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/interests');
    }

    public function show(interests $interests)
    {
        //
    }

    public function edit( $id)
    {
        $rec = interests::all()->find($id);
        return view('admin.interests-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = interests::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/interests');

    }

    public function destroy($id)
    {
        //
        $rec = interests::all()->find($id)->delete();

        return redirect('admin/interests');

    }
}
