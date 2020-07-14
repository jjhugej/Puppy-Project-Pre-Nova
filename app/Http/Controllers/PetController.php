<?php

namespace App\Http\Controllers;

use App\Pet;
use Auth;
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
        if(Auth::check()){
            $user = Auth::user();
            $userPetsArr = $user->pets()->pluck('id')->toArray();
            $pets = Pet::paginate(20);

             foreach($pets as $pet){
                if(in_array($pet->id, $userPetsArr)){
                    $pet->is_liked = true;
                }
            } 

            return $pets;
            /* return Pet::all()->users()->get(); */
        }else{
            return Pet::paginate(20);
        }
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
        return $pet;
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

    public function like($id){
        $user = Auth::user();
        //return $user;
        // TODO: FINISH LINKING USERS WITH LIKED PETS WITH ATTACH() method
        $user->pets()->attach($id);

        return 'success';
    }
    public function unlike($id){
        $user = Auth::user();
        //return $user;
        // TODO: FINISH LINKING USERS WITH LIKED PETS WITH ATTACH() method
        $user->pets()->detach($id);

        return 'success';
    }
    public function likedPets(){
  
        $user = Auth::user();
            $userPetsArr = $user->pets()->pluck('id')->toArray();
            $pets = $user->pets()->paginate(10);

             foreach($pets as $pet){
                if(in_array($pet->id, $userPetsArr)){
                    $pet->is_liked = true;
                }
            } 

            return $pets;
    }
    
    
}
