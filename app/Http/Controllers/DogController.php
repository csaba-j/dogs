<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dog;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {            
            return view('dashboard', [
                'dogs' => Dog::paginate(10)
            ]);
        } else {
            return view('welcome', [
                'dogs' => Dog::paginate(10)
            ]);
        }

    }

    public function search(Request $request) {
        $filter = $request->query('name');

        if (!empty($filter)) {
            $dogs = Dog::where('name', 'like', '%'.$filter.'%')
                ->paginate(10);
        } else {
            $dogs = Dog::paginate(10);
        }

        if (Auth::check()) {            
            return view('dashboard', [
                'dogs' => $dogs
            ]);
        } else {
            return view('welcome', [
                'dogs' => $dogs
            ]);
        }
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
            'rex' => $request->get('rex') == "on" ? 1 : 0,
            'short_legs' => $request->get('short_legs') == "on" ? 1 : 0,
            'suppressed_tail' => $request->get('suppressed_tail') == "on" ? 1 : 0,
            'temperament' => $request->get('temperament'),
            'weight_imperial' => $request->get('weight_imperial'),
            'wikipedia_url' => $request->get('wikipedia_url'),
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $image_name = $dog->id . '.' . $image->getClientOriginalExtension();
            $path = Storage::putFileAs('public', $image, $image_name);
            $img_url = url(asset('storage/'.$image_name));
            $dog->image = [
                'url' => $img_url
            ];
            $dog->reference_image_name = $image_name; 
            $dog->save();
        }

        Session::flash('message', "Successfully added ".$dog->name." to database.");

        return redirect('add');
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
        $dog = Dog::where('id', $id)
            ->first();
        return view('edit', [
            'dog' => $dog
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
        $dog = Dog::where('id', $id)->first();

        Validator::make($request->except('_token'), [
            'name' => [
                'required',
                Rule::unique('dogs')->ignore($dog->id),
            ],
            'life_span' => 'required',
            'name' => 'required|unique:dogs',
            'origin' => 'required',
            'temperament' => 'required',
            'weight_imperial' => 'required',
            'wikipedia_url' => 'required',
            'image' => 'mimes:jpg,bmp,png,jpeg|max:3500'
        ]);

        Dog::where('id', $id)
            ->update([
                'alt_names' => $request->get('alt_names'),
                'experimental' => $request->get('experimental') == "on" ? 1 : 0,
                'hairless' => $request->get('hairless') == "on" ? 1 : 0,
                'hypoallergenic' => $request->get('hypoallergenic') == "on" ? 1 : 0,
                'life_span' => $request->get('life_span'),
                'natural' => $request->get('natural') == "on" ? 1 : 0,
                'name' => $request->get('name'),
                'origin' => $request->get('origin'),
                'rare' => $request->get('rare') == "on" ? 1 : 0,
                'rex' => $request->get('rex') == "on" ? 1 : 0,
                'short_legs' => $request->get('short_legs') == "on" ? 1 : 0,
                'suppressed_tail' => $request->get('suppressed_tail') == "on" ? 1 : 0,
                'temperament' => $request->get('temperament'),
                'weight_imperial' => $request->get('weight_imperial'),
                'wikipedia_url' => $request->get('wikipedia_url'),
            ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_name = $dog->id . '.' . $image->getClientOriginalExtension();
            $exists = Storage::disk('public')->exists($dog->reference_image_name);
            if ($exists) {
                Storage::disk('public')->delete($dog->reference_image_name);
            }
            $path = Storage::putFileAs('public', $image, $image_name);
            $img_url = url(asset('storage/' .$image_name));
            $dog = Dog::where('id', $id)
                ->first();
            $dog->image = [
                'url' => $img_url
            ];
            $dog->reference_image_name = $image_name;
            $dog->save();


            Session::flash('message', "Successfully edited " . $dog->name . ".");

            return redirect('dashboard');

        }
    }

    public function confirmDelete(Request $request, $id) {
        $dog = Dog::where('id', $id)->first();

        return view('confirm_delete', [
            'dog' => $dog
        ]);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dog = Dog::where('id', $id)->first();

        $deleted_name = $dog->name;

        if($dog->reference_image_name){
            $exists = Storage::disk('public')->exists($dog->reference_image_name);
            if($exists) {
                Storage::disk('public')->delete($dog->reference_image_name);
            }
        }

        $dog->delete();

        Session::flash('message', "Successfully deleted ".$deleted_name." from database.");

        return redirect('dashboard');
    }
}
