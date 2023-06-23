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
        $jar = Jar::all();
        return view('jar.index', ['jar' => $jar]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jar $jar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jar $jar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jar $jar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jar $jar)
    {
        //
    }
}
