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
        $jar = Jar::orderBy('savings', 'desc')->get();
        $totalSavings = Jar::sum('savings');
        return view('jar.index', compact('jar', 'totalSavings'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        'jar_name' => 'required',
        'link' => 'required',
        'description' => 'required',
        'cost' => 'required',
        'category' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   

    $jar = new Jar([
        'jar_name' => $request->input('jar_name'),
        'link' => $request->input('link'),
        'description' => $request->input('description'),
        'cost' => $request->input('cost'),
        'category' => $request->input('category'),
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $jar->image = $imageName;
    }

    $jar->save();

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
        'savings' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
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
