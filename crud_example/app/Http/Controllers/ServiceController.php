<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Kategori;
use App\Models\Mekanik;
use App\Models\Sparepart;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function dataservice()
    {
        $data = Service::paginate(5);
        return view('dataservice', compact('data'));
    }
    public function datahistori()
    {
        // Mendapatkan iduser yang sedang login
        $iduser = Auth::id();
        // Mengambil data layanan berdasarkan iduser
        $data = Service::where('iduser', $iduser)->paginate(5);

        return view('datahistori', compact('data'));
    }

    public function tambahserviceuser()
    {
        $data = Kategori::all();
        return view('tambahserviceuser',  compact('data'));
    }
    public function tambahserviceadmin()
    {
        $dataUser = User::where('role', 'user')->get();
        $data = Kategori::all();
        return view('tambahserviceadmin',  compact('data', 'dataUser'));
    }


    public function insertserviceuser(Request $request)
    {
        $this->validate($request, [
            'idkategori' => 'required|integer',
            'nomorpolisi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'keluhan' => 'required|string|max:255',
        ]);

        Service::create([
            'idkategori' => $request->idkategori,
            'iduser' => Auth::user()->id,
            'nomorpolisi' => $request->nomorpolisi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keluhan' => $request->keluhan,
            'status' => 'New',
        ]);
        return redirect()->route('datahistori')->with('success', 'Data berhasil ditambahkan!');
    }

    public function insertserviceadmin(Request $request)
    {
        $this->validate($request, [
            'idkategori' => 'required|integer',
            'nomorpolisi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'keluhan' => 'required|string|max:255',
        ]);

        Service::create([
            'idkategori' => $request->idkategori,
            'iduser' => $request->iduser,
            'nomorpolisi' => $request->nomorpolisi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keluhan' => $request->keluhan,
            'status' => 'New',
        ]);
        return redirect()->route('dataservice')->with('success', 'Data berhasil ditambahkan!');
    }

    public function tampilkanservice($id)
    {
        $data = Service::with('user', 'kategori', 'mekanik', 'spareparts')->find($id);
        $allMekanik = Mekanik::all();
        $allSparepart = Sparepart::all();

        return view('tampilkanservice', compact('data', 'allMekanik', 'allSparepart'));
    }

    public function updateService(Request $request, $id)
    {
        $this->validate($request, [
            'idmekanik' => 'required|exists:mekaniks,id',
            'idspareparts.*' => 'required|exists:spareparts,id',
            'status' => 'required|string',
            'jumlah.*' => 'required|integer|min:1',
            'totalHarga' => 'required|integer|min:0',
        ]);

        $data = Service::findOrFail($id);

        // Update data service
        $data->update([
            'idmekanik' => $request->idmekanik,
            'status' => $request->status,
            'jumlah' => $request->totalHarga, // Assuming 'jumlah' is the total price in 'services' table
        ]);

        // Sync spareparts with quantities
        $spareparts = [];
        foreach ($request->idspareparts as $sparepartId) {
            $spareparts[$sparepartId] = ['jumlah' => $request->jumlah[$sparepartId]];
        }
        $data->spareparts()->sync($spareparts);

        return redirect()->route('invoice', $data->id)->with('success', 'Data berhasil diupdate!');
    }

    public function invoice($id)
    {
        $service = Service::with('spareparts')->findOrFail($id);
        return view('invoice', compact('service'));
    }
    public function exportpdf($id)
    {
        $service = Service::findOrFail($id);
        view()->share('service', $service);
        $pdf = Pdf::loadView('datainvoice-pdf');
        return $pdf->download('invoice.pdf');
    }
    public function deleteservice($id)
    {
        $data = Service::find($id);
        $data->delete();
        return redirect()->route('dataservice')->with('success', 'data berhasil dihapus !');
    }
}
