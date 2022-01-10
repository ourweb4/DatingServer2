<?php
/*
* File Name:  PoliticsController.php
* Created on 1/9/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\politics;
use Illuminate\Http\Request;

class PoliticsController extends Controller
{

    public function index()
    {
        //
        $recs = politics::all();
        return view('admin.politics', compact('recs'));
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

        $rec = new politics();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/politics');
    }

    public function show(politics $politics)
    {
        //
    }

    public function edit( $id)
    {
        $rec = politics::all()->find($id);
        return view('admin.politics-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = politics::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/politics');

    }

    public function destroy($id)
    {
        //
        $rec = politics::all()->find($id)->delete();

        return redirect('admin/politics');

    }
}
