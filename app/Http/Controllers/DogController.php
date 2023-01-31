<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dog::create([
            'alt_names' => $request->get('alt_names'),
            'experimental' => $request->get('experimental'),
            'hairless' => $request->get('hairless'),
            'hypoallergenic' => $request->get('hypoallergenic'),
            'life_span' => $request->get('life_span'),
            'natural' => $request->get('natural'),
            'name' => $request->get('name'),
            'origin' => $request->get('origin'),
            'rare' => $request->get('rare'),
            'reference_image_id' => $request->get('reference_image_id'),
            'rex' => $request->get('rex'),
            'short_legs' => $request->get('short_legs'),
            'suppressed_tail' => $request->get('suppressed_tail'),
            'temperament' => $request->get('temperament'),
            'weight_imperial' => $request->get('weight_imperial'),
            'wikipedia_url' => $request->get('wikipedia_url'),
        ]);

        return redirect('dashboard');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
