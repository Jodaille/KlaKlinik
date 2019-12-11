<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function listing(Request $request)
    {
        $species_id = 1;
        $species = Species::find($species_id);
        $animals = Animal::where('species_id' , $species_id)->get();
        return view('animals/listing')->with([
			'animals' 	 	=> $animals,
			'species' 	 	=> $species,

		]);
	
    }
}
