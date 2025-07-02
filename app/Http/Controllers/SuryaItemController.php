<?php

namespace App\Http\Controllers;

use App\Models\SuryaItem;
use App\Models\SuryaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuryaItemController extends Controller
{
    // Tampil ke user umum (jika ada)
    public function index()
    {
        $categories = SuryaCategory::with('items')->get();
        return view('items', compact('categories'));
    }

    // Tampil ke admin (list item)
    public function adminIndex()
    {
        $items = SuryaItem::with('category')->get();
        return view('admin.item', compact('items'));
    }

    // Form tambah barang
    public function create()
    {
        $categories = SuryaCategory::all();
        return view('admin.tambah_item', compact('categories'));
    }

    // Simpan barang baru
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'brand' => 'nullable',
        'rental_price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('items', 'public');
    }

    // // Cek hasil data sebelum create
    // dd($data);

    SuryaItem::create($data);

    return redirect('/admin/items')->with('success', 'Barang berhasil ditambahkan!');
}


    // Detail barang jika perlu
    public function show(SuryaItem $suryaItem)
    {
        return view('admin.items.show', compact('suryaItem'));
    }

    // Form edit barang
    public function edit($id)
    {
        $item = SuryaItem::findOrFail($id);
        $categories = SuryaCategory::all();
        return view('admin.edit_item', compact('item', 'categories'));
    }

    // Proses update barang
    public function update(Request $request, $id)
    {
        $item = SuryaItem::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand' => 'nullable',
            'rental_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Jika ada gambar baru, hapus lama, simpan baru
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($data);

        return redirect('/admin/items')->with('success', 'Barang berhasil diperbarui!');
    }

    // Hapus barang
    public function destroy($id)
    {
        $item = SuryaItem::findOrFail($id);

        // Hapus gambar dari storage kalau ada
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect('/admin/items')->with('success', 'Barang berhasil dihapus!');
    }

    public function getStock($id)
{
    $item = Item::findOrFail($id);
    return response()->json([
        'stock' => $item->stock,
        'price' => $item->rental_price
    ]);
}

}
