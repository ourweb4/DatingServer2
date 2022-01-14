<?php
/*
* File Name:  DateabilitydeetsController.php
* Created on 1/11/2022
* (c) 2022 Bill Banks
*/


namespace App\Http\Controllers;

use App\Models\dateabilitydeets;

use Illuminate\Http\Request;

class DateabilitydeetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $recs = dateabilitydeets::all();
        return view('admin.dateabilitydeets', compact('recs'));
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

        $rec = new dateabilitydeets();
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/dateabilitydeets');
    }

    public function show(dateabilitydeets $dateabilitydeets)
    {
        //
    }

    public function edit( $id)
    {
        $rec = dateabilitydeets::all()->find($id);
        return view('admin.dateabilitydeets-edit', compact('rec'));
    }

    public function update(Request $request, $id)
    {
        //
        $rec = dateabilitydeets::all()->find($id);
        $rec->description = $request->description;
        $rec->save();

        return redirect('admin/dateabilitydeets');

    }

    public function destroy($id)
    {
        //
        $rec = dateabilitydeets::all()->find($id)->delete();

        return redirect('admin/dateabilitydeets');

    }
}
