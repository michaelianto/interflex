<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $developers = Developer::paginate(8);
        return view('admin.developer.index', [
            'developers' => $developers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.developer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:developers',
            'location'=> 'required'
        ]);

        $developer = Developer::create([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect('/admin/developers')->with('add_success', $developer->name.' has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $developer = Developer::findOrFail($id);
        return view('admin.developer.update', [
            'developer' => $developer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        $developer = Developer::findOrFail($id);
        $developer->name = $request->name;
        $developer->location = $request->location;
        
        $developer->save();

        return redirect()->back()->with('update_success', $developer->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer = Developer::findOrFail($id);
        $developer->delete();
        return redirect('/admin/developers')->with('delete_success', $developer->name. ' has been deleted');
    }
}
