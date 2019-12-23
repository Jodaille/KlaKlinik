<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->q;

        $species = Species::where('slug', 'like', "%$q%" )->get()->sortBy('slug');
        $animals = Animal::where('slug', 'like', "%$q%" )->get()->sortBy('slug');

        return view('search/listing')->with([
			'species' => $species,
			'animals' => $animals,
			'query' => $q,

		]);

    }
}
