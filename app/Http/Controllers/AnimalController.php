<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function show(Request $request)
    {

        $slug = $request->slug;
        $speciesslug = $request->speciesslug;
        $id = $request->id;

        $animal = Animal::find($id);
        return view('animals/show')->with([
			'animal' => $animal,

		]);

    }
}
