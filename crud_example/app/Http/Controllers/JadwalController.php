<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    
    public function datajadwal()
    {
        $data = Jadwal::all();
        return view('datajadwal', compact('data'));
    }
    public function tambahjadwal()
    {
        return view('tambahjadwal');
    }
    public function tampilkanjadwal($id)
    {
        $data = Jadwal::find($id);
        return view('tampilkanjadwal', compact('data'));
    }
    public function insertjadwal(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ]);
        Jadwal::create($request->all());
        return redirect()->route('datajadwal')->with('success', 'data berhasil ditambahkan !');
    }
    public function updatejadwal(Request $request, $id)
    {
        $data = Jadwal::find($id);
        $data->update($request->all());
        return redirect()->route('datajadwal')->with('success', 'data berhasil diupdate !');
    }
    public function deletejadwal($id)
    {
        $data = Jadwal::find($id);
        $data->delete();
        return redirect()->route('datajadwal')->with('success', 'data berhasil dihapus !');
    }
}

