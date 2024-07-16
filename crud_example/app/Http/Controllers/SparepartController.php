<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SparepartController extends Controller
{
    public function datasparepart()
    {
        $data = Sparepart::paginate(5);
        return view('datasparepart', compact('data'));
    }
    public function tambahsparepart()
    {
        return view('tambahsparepart');
    }
    public function tampilkansparepart($id)
    {
        $data = Sparepart::find($id);
        return view('tampilkansparepart', compact('data'));
    }
    public function insertsparepart(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'jumlahsatuan' => 'required',
        ]);
        Sparepart::create($request->all());
        return redirect()->route('datasparepart')->with('success', 'data berhasil ditambahkan !');
    }
    public function updatesparepart(Request $request, $id)
    {
        $data = Sparepart::find($id);
        $data->update($request->all());
        return redirect()->route('datasparepart')->with('success', 'data berhasil diupdate !');
    }
    public function deletesparepart($id)
    {
        $data = Sparepart::find($id);
        $data->delete();
        return redirect()->route('datasparepart')->with('success', 'data berhasil dihapus !');
    }
    public function exportpdfsparepart()
    {
        $sparepart = Sparepart::all(); 

        view()->share(['sparepart' => $sparepart, 'spareparts' => $sparepart]);
        $pdf = Pdf::loadView('datasparepart-pdf');
        return $pdf->download('sparepart.pdf');
    }
}
