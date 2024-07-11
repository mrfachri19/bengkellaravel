@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Service Pelanggan</h1>
                </div>
            </div>
        </div>
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
                @error('idmekanik')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Pilih Sparepart</label>
                <select class="form-control" id="sparepartSelect" name="idspareparts[]" multiple>
                    @foreach ($allSparepart as $sparepart)
                    <option value="{{ $sparepart->id }}" data-harga="{{ $sparepart->harga }}"
                        {{ in_array($sparepart->id, $data->spareparts->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $sparepart->nama }} - {{ $sparepart->harga }}
                    </option>
                    @endforeach
                </select>
                @error('idspareparts')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="sparepartAmounts">
                @foreach ($data->spareparts as $sparepart)
                <div class="form-group">
                    <label for="jumlah{{ $sparepart->id }}">Jumlah {{ $sparepart->nama }}</label>
                    <input type="number" class="form-control" id="jumlah{{ $sparepart->id }}" name="jumlah[{{ $sparepart->id }}]" value="{{ $sparepart->pivot->jumlah }}" required>
                    @error('jumlah')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach
            </div>

            <input type="hidden" name="totalHarga" id="totalHarga" value="{{ $data->jumlah }}">

            <div class="form-group">
                <label for="totalHargaDisplay">Total Harga</label>
                <input type="text" class="form-control" id="totalHargaDisplay" placeholder="Total Harga" name="totalHargaDisplay" value="{{ $data->jumlah }}" readonly>
                @error('totalHarga')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="New" {{ $data->status == 'New' ? 'selected' : '' }}>New</option>
                    <option value="In Progress" {{ $data->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
document.addEventListener('DOMContentLoaded', function() {
    const sparepartSelect = document.getElementById('sparepartSelect');
    const sparepartAmountsDiv = document.getElementById('sparepartAmounts');
    const totalHargaInput = document.getElementById('totalHarga');
    const totalHargaDisplay = document.getElementById('totalHargaDisplay');
    let hargaSpareparts = 0;

    function calculateTotal() {
        hargaSpareparts = Array.from(sparepartAmountsDiv.querySelectorAll('input[type="number"]'))
            .reduce((acc, input) => {
                const harga = parseInt(sparepartSelect.querySelector(`option[value="${input.name.split('[')[1].split(']')[0]}"]`).getAttribute('data-harga'));
                const jumlah = parseInt(input.value);
                return acc + (harga * jumlah);
            }, 0);
        totalHargaInput.value = hargaSpareparts;
        totalHargaDisplay.value = hargaSpareparts;
    }

    sparepartSelect.addEventListener('change', function() {
        // Remove existing inputs
        while (sparepartAmountsDiv.firstChild) {
            sparepartAmountsDiv.removeChild(sparepartAmountsDiv.firstChild);
        }
        // Add inputs for selected spareparts
        Array.from(sparepartSelect.selectedOptions).forEach(option => {
            const sparepartId = option.value;
            const sparepartName = option.textContent.split(' - ')[0];
            const formGroup = document.createElement('div');
            formGroup.className = 'form-group';
            formGroup.innerHTML = `
                <label for="jumlah${sparepartId}">Jumlah ${sparepartName}</label>
                <input type="number" class="form-control" id="jumlah${sparepartId}" name="jumlah[${sparepartId}]" value="1" required>
            `;
            sparepartAmountsDiv.appendChild(formGroup);
        });
        calculateTotal();
    });

    sparepartAmountsDiv.addEventListener('input', calculateTotal);

    // Set initial value if spareparts are already selected
    calculateTotal();
});
</script>
@endsection
