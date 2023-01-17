<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        // dd(Listing::all());
        // dd(Listing::where('beds', '>=', 4)->orderBy('price', 'asc')->first());
        return inertia(
            'Index/Index',
            ['sinabi' => 'Greetings from laravel']
        );
    }

    public function show() {
        return inertia(
            'Index/Show',
            ['mensahe' => 'Vue Inertia and Tailwind.']
        );
    }
}
