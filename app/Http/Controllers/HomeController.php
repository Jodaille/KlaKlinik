<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $species_id = 1;
        $species = Species::all()->sortBy('slug');

        return view('home/index')->with([
			'species' => $species,

		]);

    }
}
