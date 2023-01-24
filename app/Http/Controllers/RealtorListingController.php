<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{

    public function __construct()
   {
        $this->authorizeResource(Listing::class, 'listing');
   }

    public function index(Request $request)
    {
        // dd(Auth::user()->listings);
        // dd($request->boolean("deleted"));
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ... $request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    ->withCount('images')
                    ->withCount('offers')
                    ->paginate(6)
                    ->withQueryString()
            ]
        );
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Realtor/Show',
            ['listing' => $listing->load('offers','offers.bidder')]
        );
    }

    public function create()
    {
        $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
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
        return redirect()->route('realtor.listing.index')->with('success','Listing was created successfully.');

    }


    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
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
        return redirect()->route('realtor.listing.index')->with('success','Listing was successfully updated.');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->back()->with('success','Listing was deleted successfully.');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();
        return redirect()->back()->with('success','Item was restored successfully.');
    }


}
