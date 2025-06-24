<?php

namespace App\Http\Controllers;
use App\Models\SuryaItem;
use App\Models\SuryaRental;
use Illuminate\Http\Request;

class SuryaRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $items = SuryaItem::all();
            return view('rentals', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rental = SuryaRental::create([
    'customer_name' => $request->customer_name,
    'rental_date' => $request->rental_date,
    'return_date' => $request->return_date,
    'status' => $request->status,
    'total_price' => $request->total_price
]);

foreach ($request->items as $key => $itemId) {
    $quantity = $request->quantities[$key];
    $item = SuryaItem::findOrFail($itemId);
    $subtotal = $item->rental_price * $quantity;

    DB::table('surya_rental_items')->insert([
        'rental_id' => $rental->id,
        'item_id' => $itemId,
        'quantity' => $quantity,
        'subtotal_price' => $subtotal,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

    }

    /**
     * Display the specified resource.
     */
    public function show(SuryaRental $suryaRental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuryaRental $suryaRental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuryaRental $suryaRental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuryaRental $suryaRental)
    {
        //
    }
}
