<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    
    public function datakategori()
    {
        $data = Kategori::all();
        return view('datakategori', compact('data'));
    }
    public function tambahkategori()
    {
        return view('tambahkategori');
    }
    public function tampilkankategori($id)
    {
        $data = Kategori::find($id);
        return view('tampilkankategori', compact('data'));
    }
    public function insertkategori(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
        ]);
        Kategori::create($request->all());
        return redirect()->route('datakategori')->with('success', 'data berhasil ditambahkan !');
    }
    public function updatekategori(Request $request, $id)
    {
        $data = Kategori::find($id);
        $data->update($request->all());
        return redirect()->route('datakategori')->with('success', 'data berhasil diupdate !');
    }
    public function deletekategori($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        return redirect()->route('datakategori')->with('success', 'data berhasil dihapus !');
    }
    public function exportpdfkategori()
    {
        $kategori = Kategori::all(); 

        view()->share(['kategori' => $kategori, 'kategoris' => $kategori]);
        $pdf = Pdf::loadView('datakategori-pdf');
        return $pdf->download('kategori.pdf');
    }
}
