<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::paginate(20);
        
        return $pets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('addpet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax()){
            $validatedData = $this->validate($request, [
                'name' => 'required|string',
                'image' => 'required|image',
            ]); 
        
            $pet = new Pet();
            $pet->name = $request->name;
            $image_path = request()->file('image')->store('images');
            $pet->image = $image_path;
            $image_name = request()->file('image')->getClientOriginalName();
            $pet->image_name = 'images/' . trim($image_name);

            $validatedData['image']->move(public_path('images'), $image_name);

            $pet->save();
    
            return $pet;
        }
        else{
          return redirect()->route('main');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
    
    
}
