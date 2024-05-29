@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Service Pelanggan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <form action="/updateservice/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="card p-3">
            @csrf
            <h1 class="m-0">Detail Service Pelanggan</h1>
            <hr>
            <span class="d-block mb-1">Nama pelanggan: {{ $data->user->name }} </span>
            <span class="d-block mb-1">Kategori Service: {{ $data->kategori->nama }} </span>
            <span class="d-block mb-1">No. Polisi: {{ $data->nomorpolisi }} </span>
            <span class="d-block mb-1">Tanggal Service: {{ $data->tanggal }} </span>
            <span class="d-block mb-1">Jam Service: {{ $data->jam }} </span>
            <span class="d-block mb-1">Keluhan: {{ $data->keluhan }} </span>
            <hr class="my-2">

            <div class="form-group">
                <label for="exampleFormControlInput1">Pilih Mekanik</label>
                <select class="form-control" id="exampleFormControlSelect1" name="idmekanik">
                    <option selected>Pilih Mekanik</option>
                    @foreach ($allMekanik as $mekanik)
                    <option value="{{ $mekanik->id }}" {{ $mekanik->id == $data->idmekanik ? 'selected' : '' }}>
                        {{ $mekanik->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Pilih Sparepart</label>
                <select class="form-control" id="sparepartSelect" name="idsparepart">
                    <option selected>Pilih Sparepart</option>
                    @foreach ($allSparepart as $sparepart)
                    <option value="{{ $sparepart->id }}" data-harga="{{ $sparepart->harga }}" {{ $sparepart->id == $data->idsparepart ? 'selected' : '' }}>
                        {{ $sparepart->nama }} - {{ $sparepart->harga }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="totalHarga">Total Harga</label>
                <input type="text" class="form-control" id="totalHarga" placeholder="Total Harga" name="jumlah" value="{{ $data->jumlah }}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="New" {{ $data->status == 'New' ? 'selected' : '' }}>New</option>
                    <option value="In Progress" {{ $data->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-info">Update Service</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sparepartSelect = document.getElementById('sparepartSelect');
    const totalHargaInput = document.getElementById('totalHarga');

    sparepartSelect.addEventListener('change', function () {
        const selectedOption = sparepartSelect.options[sparepartSelect.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga') || 0;
        totalHargaInput.value = harga;
    });

    // Set initial value if a sparepart is already selected
    const initialSelectedOption = sparepartSelect.options[sparepartSelect.selectedIndex];
    if (initialSelectedOption && initialSelectedOption.value !== 'Pilih Sparepart') {
        totalHargaInput.value = initialSelectedOption.getAttribute('data-harga') || 0;
    }
});
</script>
@endsection
