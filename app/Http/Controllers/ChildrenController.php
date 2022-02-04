<?php
/*
* File Name:  ChildrenController.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\children;

use Illuminate\Http\Request;

class ChildrenController extends Controller
{

    public function index()
    {
        //
        $recs = children::all();
        return view('admin.children', compact('recs'));
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

        $rec = new children();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/children');
    }

    public function show(children $children)
    {
        //
    }

    public function edit( $id)
    {
        $rec = children::all()->find($id);
        return view('admin.children-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = children::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/children');

    }

    public function destroy($id)
    {
        //
        $rec = children::all()->find($id)->delete();

        return redirect('admin/children');

    }
}
