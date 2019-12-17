<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\Request;

class SvgController extends Controller
{

    function arrowdown()
    {
        $color = '#FF0000';
        return response()
            ->view('icons.arrowdown', [
                'color' => $color
            ], 200)
            ->header('Content-Type', 'image/svg+xml');
    }
    function medal()
    {
        $color = '#1D1D1B';
        return response()
            ->view('icons.medal', [
                'color' => $color
            ], 200)
            ->header('Content-Type', 'image/svg+xml');
    }
    function medalred()
    {
        $color = '#EB6A6A';
        return response()
            ->view('icons.medal', [
                'color' => $color
            ], 200)
            ->header('Content-Type', 'image/svg+xml');
    }

}

