<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        // dd(Auth::user());
        //  dd(Auth::check());
        // $listing = Listing::make([
        //     'beds' => 5, 'baths' => 4, 'kitchen' => 1, 'dinning' => 1, 'area' => 500, 'city' => 'North Carolina',
        //     'code' => 1428, 'street' => 'Golden Valley', 'street_no' => 35, 'price' => 3200000
        // ]);
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
