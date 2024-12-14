<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->get();

        return view("merchant.index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("merchant.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar_barang' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('gambar_barang')){
            $file = $request->file("gambar_barang");

            if($file->isValid()){
                $imagePath = $file->storeAs('items', $file->hashName(), 'public');

                Item::create([
                    'nama_barang' => $request->nama_barang,
                    'harga_barang' => $request->harga_barang,
                    'stok' => $request->stok,
                    'gambar_barang' => $imagePath
                ]);

                return redirect()->route("merchant.index")->with('success', 'Item berhasil ditambahkan');

            };
        }else{
            return redirect()->back()->withErrors('gambar_barang', 'Gambar barang gagal dimasukan');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Item::find($id);    

        if (!$item) {
            return redirect()->route('merchant.index')->withErrors('Item tidak ditemukan.');
        }

        return view('merchant.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $item = Item::find($id);    

        if (!$item) {
            return redirect()->route('merchant.index')->withErrors('Item tidak ditemukan.');
        }

        return view("merchant.edit", compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        if ($request->hasFile('gambar_barang')) {
            if ($item->gambar_barang && Storage::disk('public')->exists($item->gambar_barang)) {
                Storage::disk('public')->delete($item->gambar_barang);
            }

            $request->validate([
                'gambar_barang' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            $file = $request->file("gambar_barang");
            if ($file->isValid()) {
                $imagePath = $file->storeAs('items', $file->hashName(), 'public');
            }
        } else {
            $imagePath = $item->gambar_barang; 
        }

        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $item->update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'stok' => $request->stok,
            'gambar_barang' => $imagePath,
        ]);

        return redirect()->route("merchant.index")->with('success', 'Item berhasil diedit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $item = Item::find($id);    

        if (!$item) {
            return redirect()->route('merchant.index')->withErrors('Item tidak ditemukan.');
        }

        if ($item->gambar_barang && Storage::disk('public')->exists($item->gambar_barang)) {
            Storage::disk('public')->delete($item->gambar_barang);
        }
    
        $item->delete();
    
        return redirect()->route("merchant.index")->with('success', 'Item berhasil dihapus');
    }
}
