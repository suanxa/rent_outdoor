<?php

namespace App\Http\Controllers;

use App\Models\SuryaCustomer;
use Illuminate\Http\Request;
use App\Models\SuryaUser;

class SuryaCustomerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuryaCustomer $suryaCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuryaCustomer $suryaCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuryaCustomer $suryaCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $user = auth()->user();
    if ($user->role !== 'admin') {
        abort(403, 'Akses ditolak. Hanya admin yang boleh menghapus customer.');
    }

    $customer = \App\Models\SuryaCustomer::findOrFail($id);
    $customer->delete();

    return redirect()->back()->with('success', 'Customer berhasil dihapus.');
}

}
