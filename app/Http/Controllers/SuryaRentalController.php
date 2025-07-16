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
    $categories = SuryaCategory::with(['items' => function($query) {
        $query->where('stock', '>', 0);
    }])->get();

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
    $customer = SuryaCustomer::create([
        'name'    => $request->customer_name,
        'email'   => $request->customer_email,
        'phone'   => $request->customer_phone,
        'address' => $request->customer_address,
    ]);

    $user = auth()->user();

    $itemsData = [];
    $subtotal  = 0;

    foreach ($request->items as $key => $itemId) {
        $quantity = $request->quantities[$key];
        $item     = SuryaItem::findOrFail($itemId);

        if ($item->stock < $quantity) {
            return response()->json([
                'error' => 'Stok ' . $item->name . ' hanya tersedia ' . $item->stock . ' unit.'
            ], 400);
        }

        $itemSubtotal = $item->rental_price * $quantity;
        $subtotal    += $itemSubtotal;

        $itemsData[] = [
            'item_id'  => $itemId,
            'quantity' => $quantity,
            'subtotal' => $itemSubtotal,
            'name'     => $item->name,
            'price'    => $item->rental_price,
        ];

        // Kurangi stok
        $item->stock -= $quantity;
        $item->save();
    }

    $discount    = auth()->check() ? $subtotal * 0.25 : 0;
    $total_price = $subtotal - $discount;

    $rental = SuryaRental::create([
        'customer_id' => $customer->id,
        'user_id'     => $user ? $user->id : null,
        'rental_date' => $request->rental_date,
        'return_date' => $request->return_date,
        'status'      => 'booked',
        'total_price' => $total_price,
    ]);

    foreach ($itemsData as $item) {
        DB::table('surya_rental_items')->insert([
            'rental_id'  => $rental->id,
            'item_id'    => $item['item_id'],
            'quantity'   => $item['quantity'],
            'subtotal'   => $item['subtotal'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    if ($request->ajax()) {
        return response()->json([
            'customer_name'    => $customer->name,
            'customer_email'   => $customer->email,
            'customer_phone'   => $customer->phone,
            'customer_address' => $customer->address,
            'rental_date'      => $rental->rental_date,
            'return_date'      => $rental->return_date,
            'items'            => $itemsData,
            'subtotal'         => $subtotal,
            'discount'         => $discount,
            'total_price'      => $total_price,
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

    $rental = SuryaRental::with('items')->findOrFail($id);
    $oldStatus = $rental->status;
    $newStatus = $request->status;

    // Kalau status berubah dari booked/ongoing ke completed/cancelled
    if (in_array($oldStatus, ['booked', 'ongoing']) && in_array($newStatus, ['completed', 'cancelled'])) {
        foreach ($rental->items as $item) {
            $item->stock += $item->pivot->quantity;
            $item->save();
        }
    }

    $rental->status = $newStatus;
    $rental->save();

    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $rental = SuryaRental::with('customer')->findOrFail($id);
    $customer = $rental->customer;

    // Hapus rental-nya dulu
    $rental->delete();

    // Cek apakah customer masih punya rental lain
    if ($customer->rentals()->count() == 0) {
        $customer->delete();
    }

    return redirect()->back()->with('success', 'Data pesanan berhasil dihapus!');
}

}

