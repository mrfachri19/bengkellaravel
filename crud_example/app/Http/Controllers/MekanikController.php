<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    public function datamekanik()
    {
        $data = Mekanik::all();
        return view('datamekanik', compact('data'));
    }
    public function tambahmekanik()
    {
        return view('tambahmekanik');
    }
    public function tampilkanmekanik($id)
    {
        $data = Mekanik::find($id);
        return view('tampilkanmekanik', compact('data'));
    }
    public function insertmekanik(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kodekaryawan' => 'required',
        ]);
        Mekanik::create($request->all());
        return redirect()->route('datamekanik')->with('success', 'data berhasil ditambahkan !');
    }
    public function updatemekanik(Request $request, $id)
    {
        $data = Mekanik::find($id);
        $data->update($request->all());
        return redirect()->route('datamekanik')->with('success', 'data berhasil diupdate !');
    }
    public function deletemekanik($id)
    {
        $data = Mekanik::find($id);
        $data->delete();
        return redirect()->route('datamekanik')->with('success', 'data berhasil dihapus !');
    }
}
