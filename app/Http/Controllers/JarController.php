<?php

namespace App\Http\Controllers;

use App\Models\Jar;
use Illuminate\Http\Request;

class JarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jar = Jar::latest()->paginate(5);
        return view('jar.index',compact('jar'))->with ('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'jar_name'=>'required',
        'link'=>'required',
        'description'=>'required',
        'cost'=>'required',
       ]);
       Jar::create($request->all());

       return redirect()->route('jar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jar $jar)
    {
        return view('jar.show',compact('jar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jar $jar)
    {
        return view('jar.edit',compact('jar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jar $jar)
{
    $request->validate([
        'savings' => 'required|numeric',
    ]);

    $jar->savings += $request->input('savings', 0); // Add the new input value to the existing savings

    $jar->save();

    return redirect()->route('jar.index');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jar $jar)
    {
        $jar->delete();
    return redirect()->route('jar.index');
    }

    public function buy(Jar $jar)
{
    $jar->buy = true;
    $jar->save();

    // You can perform any additional actions here if needed

    return redirect()->back()->with('success', 'You have successfully bought the jar.');
}

}
