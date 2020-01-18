<?php

namespace App\Http\Controllers;

use \Storage;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function upload(Request $request) {
        $img = $request->image;
        $id = $request->animal_id;
        $animal = Animal::find($id);
        $filename = "uploads/$animal->slug.png";
        $animal->setImageAttribute($img);

        $animal->save();
        $animal->image_src = $animal->imageSrc;
        return response(['animal' => $animal],Response::HTTP_OK);
      }
}
