<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\SuryaItem;
use App\Models\SuryaRental;
use App\Models\SuryaCategory;
use App\Models\SuryaCustomer;
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
    $categories = SuryaCategory::with('items')->get();
    return view('rentals', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // 1. Simpan ke tabel customers
    $customer = SuryaCustomer::create([
    'name' => $request->customer_name,
    'email' => $request->customer_email,
    'phone' => $request->customer_phone,
    'address' => $request->customer_address,
]);


    // 2. Simpan ke tabel rentals
    $user = auth()->user();
    $rental = SuryaRental::create([
        'customer_id' => $customer->id,
        'user_id'     => $user->id, // misal admin login
        'rental_date' => $request->rental_date,
        'return_date' => $request->return_date,
        'status'      => $request->status,
        'total_price' => $request->total_price,
    ]);

    // 3. Simpan barang rental ke tabel surya_rental_items
    foreach ($request->items as $key => $itemId) {
        $quantity = $request->quantities[$key];
        $item = SuryaItem::findOrFail($itemId);
        $subtotal = $item->rental_price * $quantity;

        DB::table('surya_rental_items')->insert([
            'rental_id'      => $rental->id,
            'item_id'        => $itemId,
            'quantity'       => $quantity,
            'subtotal' => $subtotal,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }

      return redirect()->back()->with('success', 'Booking berhasil disimpan!');
}

public function adminIndex()
{
    $rentals = SuryaRental::with('customer', 'items')->get();  // pastikan relasi customer & items dibuat
    return view('admin.rental', compact('rentals'));
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
