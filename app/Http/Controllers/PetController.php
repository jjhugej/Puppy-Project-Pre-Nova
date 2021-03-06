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
            $userPetsArr = $user->pets()->pluck('pets.id')->toArray();
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
                'age' => 'required|between:0,99.99',
                'animalType' => 'required|string',
                'animalBreed' => 'required|string',
                'animalSex' => 'required|string',
                'image' => 'required|image',
            ]); 
        
            $pet = new Pet();
            $pet->name = $request->name;
            $pet->age = $request->age;
            $pet->animal_type = $request->animalType;
            $pet->animal_breed = $request->animalBreed;
            $pet->animal_sex = $request->animalSex;
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
        $user = Auth::user();

        //returns null if pet is not liked
        $petIsLiked = $user->pets()->where('pet_id', $pet->id)->first();

        if($petIsLiked !== null){
            $pet->is_liked = true;
            return $pet;
        }else{
            $pet->is_liked = false;
            return $pet;
        }
      
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
    
        $user->pets()->attach($id);

        return 'success';
    }
    public function unlike($id){
        $user = Auth::user();
      
        $user->pets()->detach($id);

        return 'success';
    }
    public function likedPets(){
  
        $user = Auth::user();
            $userPetsArr = $user->pets()->pluck('pets.id')->toArray();
            $pets = $user->pets()->paginate(10);

             foreach($pets as $pet){
                if(in_array($pet->id, $userPetsArr)){
                    $pet->is_liked = true;
                }
            } 

            return $pets;
    }

    public function refineSearch(Request $request){
        /* if(Auth::check()){
            $user = Auth::user();
            $userPetsArr = $user->pets()->pluck('pets.id')->toArray();
            $pets = Pet::paginate(20);

             foreach($pets as $pet){
                if(in_array($pet->id, $userPetsArr)){
                    $pet->is_liked = true;
                }
            } 

            return $pets;
            //return Pet::all()->users()->get();
        }else{
            return Pet::paginate(20);
        } */
        $animal_type = request()->query('animal_type');
        $age = request()->query('age');

        // possible refactor here. There are too many if statements. 
        if($animal_type == 'all' && $age == 'all'){
            $pets = Pet::paginate(20);
            $pets = $this->checkForLikedPets($pets);
            return $pets;
        }
        elseif($age == 'all'){
            $pets = Pet::where('animal_type', $animal_type)->paginate(20);
            $pets = $this->checkForLikedPets($pets);
            return $pets;
        }
        elseif($age == 'less_than_one'){
            if($animal_type !== 'all'){
                $pets = Pet::where('animal_type', $animal_type)->where('age', '<', 1)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }else{
                $pets = Pet::where('age', '<',1)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }
        }elseif($age == 'less_than_five'){
            if($animal_type !== 'all'){
                $pets = Pet::where('animal_type', $animal_type)->where('age', '<', 5)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }else{
                $pets = Pet::where('age', '<', 5)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }
            
        }elseif($age == 'five_or_more'){
             if($animal_type !== 'all'){
                $pets = Pet::where('animal_type', $animal_type)->where('age', '>=', 5)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }else{
                $pets = Pet::where('age', '>=', 5)->paginate(20);
                $pets = $this->checkForLikedPets($pets);
                return $pets;
            }
           
        }
        else{
            return 'something went wrong';
        }

       

    }
    
    public function checkForLikedPets($pets){
        if(Auth::check()){
            $user = Auth::user();
            $userPetsArr = $user->pets()->pluck('pets.id')->toArray();
            //$pets = Pet::paginate(20);

             foreach($pets as $pet){
                if(in_array($pet->id, $userPetsArr)){
                    $pet->is_liked = true;
                }
            } 

            return $pets;
            /* return Pet::all()->users()->get(); */
        }
    }
    
}
