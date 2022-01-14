<?php
/*
* File Name:  EducationController.php
* Created on 1/8/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $recs = education::all();
        return view('admin.education', compact('recs'));
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

        $rec = new education();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/education');
    }

    public function show(education $education)
    {
        //
    }

    public function edit( $id)
    {
        $rec = education::all()->find($id);
        return view('admin.education-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = education::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/education');

    }

    public function destroy($id)
    {
        //
        $rec = education::all()->find($id)->delete();

        return redirect('admin/education');

    }
}
