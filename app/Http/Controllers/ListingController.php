<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
        );
    }

    public function create()
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        // dd($request->all(0));
        Listing::create(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:10000',
                'kitchen' => 'required|integer|min:1|max:5',
                'dinning' => 'required|integer|min:1|max:5',
                'area' => 'required|integer|min:20|max:1500',

                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_no' => 'required|min:1|max:1000',

                'price' => 'required|integer|min:1|max:10000000000'
            ])
        );
        return redirect()->route('listing.index')->with('success','Listing was created successfully.');
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:10000',
                'kitchen' => 'required|integer|min:1|max:5',
                'dinning' => 'required|integer|min:1|max:5',
                'area' => 'required|integer|min:20|max:1500',

                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_no' => 'required|min:1|max:1000',

                'price' => 'required|integer|min:1|max:10000000000'
            ])
        );
        return redirect()->route('listing.index')->with('success','Listing was successfully updated.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success','Listing was deleted successfully.');
    }
}
