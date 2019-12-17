<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function listing($slug, Request $request)
    {
        $species_id = 1;
        $species = Species::where(['slug' => $slug])->first();
        $animals = Animal::where('species_id' , $species->id)->get();
        return view('animals/listing')->with([
			'animals' 	 	=> $animals,
			'species' 	 	=> $species,

		]);

    }
}
