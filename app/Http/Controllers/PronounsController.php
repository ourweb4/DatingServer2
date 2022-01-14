<?php
/*
* File Name:  PronounsController.php
* Created on 1/14/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

//use App\Models\pronouns;
use App\Models\pronouns;
use Illuminate\Http\Request;

class PronounsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $recs = pronouns::all();
        return view('admin.pronouns', compact('recs'));
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

        $rec = new pronouns();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/pronouns');
    }


    public function show(pronouns $pronouns)
    {
        //
    }

    public function edit( $id)
    {
        $rec = pronouns::all()->find($id);
        return view('admin.pronouns-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = pronouns::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/pronouns');

    }

    public function destroy($id)
    {
        //
        $rec = pronouns::all()->find($id)->delete();

        return redirect('admin/pronouns');

    }

}
