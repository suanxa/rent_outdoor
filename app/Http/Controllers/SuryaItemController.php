<?php

namespace App\Http\Controllers;

use App\Models\SuryaItem;
use Illuminate\Http\Request;

class SuryaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
        $items = SuryaItem::all();
        return view('items', compact('items'));
        }
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
    public function show(SuryaItem $suryaItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuryaItem $suryaItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuryaItem $suryaItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuryaItem $suryaItem)
    {
        //
    }
}
