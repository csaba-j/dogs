<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dog;
use Illuminate\Support\Facades\Session;


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
        $validated = $request->validate([
            'life_span' => 'required',
            'name' => 'required|unique:dogs',
            'origin' => 'required',
            'temperament' => 'required',
            'weight_imperial' => 'required',
            'wikipedia_url' => 'required',
            'image' => 'mimes:jpg,bmp,png,jpeg|max:3500'
        ]);


        $dog = Dog::create([
            'alt_names' => $request->get('alt_names'),
            'experimental' => $request->get('experimental') == "on" ? 1 : 0,
            'hairless' => $request->get('hairless') == "on" ? 1 : 0,
            'hypoallergenic' => $request->get('hypoallergenic') == "on" ? 1 : 0,
            'life_span' => $request->get('life_span'),
            'natural' => $request->get('natural') == "on" ? 1 : 0,
            'name' => $request->get('name'),
            'origin' => $request->get('origin'),
            'rare' => $request->get('rare') == "on" ? 1 : 0,
            'reference_image_id' => $request->get('reference_image_id'),
            'rex' => $request->get('rex') == "on" ? 1 : 0,
            'short_legs' => $request->get('short_legs') == "on" ? 1 : 0,
            'suppressed_tail' => $request->get('suppressed_tail') == "on" ? 1 : 0,
            'temperament' => $request->get('temperament'),
            'weight_imperial' => $request->get('weight_imperial'),
            'wikipedia_url' => $request->get('wikipedia_url'),
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $path = Storage::putFileAs('public', $image, $dog->id.'.'.$image->getClientOriginalExtension());
        }

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
