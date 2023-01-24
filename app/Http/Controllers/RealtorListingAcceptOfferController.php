<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // Accept Selected offer
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        // Reject other offers when accept button is clicked
        $listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()->with('success', 'Offer no.{$offer->id} accepted');
    }
}
