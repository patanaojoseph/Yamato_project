<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

   public function __construct()
   {
    $this->authorizeResource(Listing::class, 'listing');
   }

    public function index(Request $request)
    {
        // $filters = $request->only([
        //     'beds', 'baths', 'kitchen', 'dinning', 'priceFrom', 'priceTo', 'areaFrom', 'areaTo'
        // ]);
        // $query = Listing::orderByDesc('created_at')
        // if($filters['beds'] ?? false) {
        //     $query->where('beds', $filters['beds']);
        // }

        // if($filters['baths'] ?? false) {
        //     $query->where('baths', $filters['baths']);
        // }

        // if($filters['kitchen'] ?? false) {
        //     $query->where('kitchen', $filters['kitchen']);
        // }

        // if($filters['dinning'] ?? false) {
        //     $query->where('dinning', $filters['dinning']);
        // }

        // if($filters['priceFrom'] ?? false) {
        //     $query->where('price', '>=', $filters['priceFrom']);
        // }

        // if($filters['priceTo'] ?? false) {
        //     $query->where('price', '<=', $filters['priceTo']);
        // }

        // if($filters['areaFrom'] ?? false) {
        //     $query->where('area', '>=', $filters['areaFrom']);
        // }

        // if($filters['areaTo'] ?? false) {
        //     $query->where('area', '<=', $filters['areaTo']);
        // }

        // return inertia(
        //     'Listing/Index',
        //     [
        //         'filters' => $filters,
        //         'listings' => $query->paginate(6)
        //             ->withQueryString()
        //     ]
        // );

        // $filters = $request->only([
        //     'beds', 'baths', 'kitchen', 'dinning', 'priceFrom', 'priceTo', 'areaFrom', 'areaTo'
        // ]);
        // $query = Listing::orderByDesc('created_at')
        // ->when(
        //     $filters['beds'] ?? false,
        //     fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
        // )
        // ->when(
        //     $filters['baths'] ?? false,
        //     fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
        // )
        // ->when(
        //     $filters['kitchen'] ?? false,
        //     fn ($query, $value) => $query->where('kitchen', (int)$value < 3 ? '=' : '>=', $value)
        // )
        // ->when(
        //     $filters['dinning'] ?? false,
        //     fn ($query, $value) => $query->where('dinning', (int)$value < 3 ? '=' : '>=', $value)
        // )
        // ->when(
        //     $filters['priceFrom'] ?? false,
        //     fn ($query, $value) => $query->where('price', '>=', $value)
        // )
        // ->when(
        //     $filters['priceTo'] ?? false,
        //     fn ($query, $value) => $query->where('price', '<=', $value)
        // )
        // ->when(
        //     $filters['areaFrom'] ?? false,
        //     fn ($query, $value) => $query->where('area', '>=', $value)
        // )
        // ->when(
        //     $filters['areaTo'] ?? false,
        //     fn ($query, $value) => $query->where('area', '<=', $value)
        // );

        // return inertia(
        //     'Listing/Index',
        //     [
        //         'filters' => $filters,
        //         'listings' => $query->paginate(6)
        //             ->withQueryString()
        //     ]
        // );

        $filters = $request->only([
            'beds', 'baths', 'kitchen', 'dinning', 'priceFrom', 'priceTo', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                ->when(
                    $filters['beds'] ?? false,
                    fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
                )
                ->when(
                    $filters['baths'] ?? false,
                    fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
                )
                ->when(
                    $filters['kitchen'] ?? false,
                    fn ($query, $value) => $query->where('kitchen', (int)$value < 3 ? '=' : '>=', $value)
                )
                ->when(
                    $filters['dinning'] ?? false,
                    fn ($query, $value) => $query->where('dinning', (int)$value < 3 ? '=' : '>=', $value)
                )
                ->when(
                    $filters['priceFrom'] ?? false,
                    fn ($query, $value) => $query->where('price', '>=', $value)
                )
                ->when(
                    $filters['priceTo'] ?? false,
                    fn ($query, $value) => $query->where('price', '<=', $value)
                )
                ->when(
                    $filters['areaFrom'] ?? false,
                    fn ($query, $value) => $query->where('area', '>=', $value)
                )
                ->when(
                    $filters['areaTo'] ?? false,
                    fn ($query, $value) => $query->where('area', '<=', $value)
                )->paginate(6)
                    ->withQueryString()
            ]
        );
    }

    public function create()
    {
        $this->authorize('create', Listing::class);
        return inertia('Listing/Create');
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
        return redirect()->route('listing.index')->with('success','Listing was created successfully.');

    }

    public function show(Listing $listing)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }

        // $this->authorize('view', $listing);
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
