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
   public function index(Request $request)
{
    // $query = SuryaRental::with(['customer', 'items']);

    // if ($request->has('search') && $request->search != '') {
    //     $query->whereHas('customer', function ($q) use ($request) {
    //         $q->where('name', 'like', '%' . $request->search . '%');
    //     });
    // }

    // $rentals = $query->latest()->get();

    // return view('admin.rental', compact('rentals'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $categories = SuryaCategory::with('items')->get();
    return view('rentals', compact('categories'));
    }
    public function search(Request $request)
{
    $keyword = $request->keyword;

    $rentals = SuryaRental::with(['customer', 'items'])
        ->whereHas('customer', function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })
        ->get();

    return view('admin.rental', compact('rentals'))->render();
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
    'user_id'     => $user ? $user->id : null, // kalau ga login, isi null
    'rental_date' => $request->rental_date,
    'return_date' => $request->return_date,
    'status'      => 'booked',
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
public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:booked,ongoing,completed,cancelled'
    ]);

    $rental = SuryaRental::findOrFail($id);
    $rental->status = $request->status;
    $rental->save();

    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $rental = SuryaRental::findOrFail($id);
    $rental->delete();

    return redirect()->back()->with('success', 'Data pesanan berhasil dihapus!');
}
}

