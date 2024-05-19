@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Gaji</div>

                <div class="card-body">
                    <form action="{{ route('gaji.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="kd_gaji">Kode Gaji:</label>
                            <input type="text" name="kd_gaji" id="kd_gaji" class="form-control" value="{{ old('kd_gaji') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_gaji">Tanggal Gaji:</label>
                            <input type="date" name="tgl_gaji" id="tgl_gaji" class="form-control" value="{{ old('tgl_gaji') }}">
                        </div>

                        <div class="row mb-3">
                            <label for="guru_id" class="col-md-4 col-form-label text-md-end">Guru</label>
                            <div class="col-md-6">
                                <select id="guru_id" class="form-control @error('guru_id') is-invalid @enderror" name="guru_id" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach ($guru as $gurus)
                                        <option value="{{ $gurus->id }}">{{ $gurus->nm_guru }} ({{ $gurus->nm_jabatan }} | {{ $gurus->guru_mapel }})</option>
                                    @endforeach
                                </select>
                                @error('guru_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="tunjangan-container">
                            <div class="row mb-3 tunjangan-row">
                                <label for="tunjangan_1" class="col-md-4 col-form-label text-md-end">Tunjangan 1</label>
                                <div class="col-md-6">
                                    <select id="tunjangan_1" class="form-control tunjangan-select" name="tunjangan_ids[]" required>
                                        <option value="" data-jumlah="0">Pilih Tunjangan</option>
                                        @foreach ($tunjangan as $tunjangans)
                                            <option value="{{ $tunjangans->id }}" data-jumlah="{{ $tunjangans->jumlah_tunjangan }}">
                                                {{ $tunjangans->nm_tunjangan }} | Rp. {{ number_format($tunjangans->jumlah_tunjangan, 2, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" id="addTunjangan">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="potongan-container">
                            <div class="row mb-3 potongan-row">
                                <label for="potongan_1" class="col-md-4 col-form-label text-md-end">Potongan 1</label>
                                <div class="col-md-6">
                                    <select id="potongan_1" class="form-control potongan-select" name="potongan_ids[]" required>
                                        <option value="" data-jumlah="0">Pilih Potongan</option>
                                        @foreach ($potongan as $potongans)
                                            <option value="{{ $potongans->id }}" data-jumlah="{{ $potongans->jumlah_potongan }}">
                                                {{ $potongans->nm_potongan }} | Rp. {{ number_format($potongans->jumlah_potongan, 2, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" id="addPotongan">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jam_mengajar" class="col-md-4 col-form-label text-md-end">Jam Mengajar (1 Jam Rp.30.000)</label>
                            <div class="col-md-6">
                                <input id="jam_mengajar" type="number" class="form-control @error('jam_mengajar') is-invalid @enderror" name="jam_mengajar" value="{{ old('jam_mengajar') }}" required>
                                @error('jam_mengajar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gaji_pokok_display" class="col-md-4 col-form-label text-md-end">Gaji Pokok</label>
                            <div class="col-md-6">
                                <input id="gaji_pokok_display" type="text" class="form-control" value="{{ old('gaji_pokok_display') }}" readonly>
                                <input id="gaji_pokok" type="hidden" name="gaji_pokok" value="{{ old('gaji_pokok') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtotal_display" class="col-md-4 col-form-label text-md-end">Total Gaji</label>
                            <div class="col-md-6">
                                <input id="subtotal_display" type="text" class="form-control" value="{{ old('subtotal_display') }}" readonly>
                                <input id="subtotal" type="hidden" name="subtotal" value="{{ old('subtotal') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add dynamic tunjangan and potongan functionality
        var tunjanganContainer = document.getElementById('tunjangan-container');
        var addButtonTunjangan = document.getElementById('addTunjangan');
        var tunjanganCount = 1;

        addButtonTunjangan.addEventListener('click', function() {
            tunjanganCount++;
            var newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3', 'tunjangan-row');
            newRow.innerHTML = `
                <label for="tunjangan_${tunjanganCount}" class="col-md-4 col-form-label text-md-end">Tunjangan ${tunjanganCount}</label>
                <div class="col-md-6">
                    <select id="tunjangan_${tunjanganCount}" class="form-control tunjangan-select" name="tunjangan_ids[]" required>
                        <option value="" data-jumlah="0">Pilih Tunjangan</option>
                        @foreach ($tunjangan as $tunjangans)
                            <option value="{{ $tunjangans->id }}" data-jumlah="{{ $tunjangans->jumlah_tunjangan }}">
                                {{ $tunjangans->nm_tunjangan }} | Rp. {{ number_format($tunjangans->jumlah_tunjangan, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="removeTunjangan(this)"><i class="fas fa-trash"></i></button>
                </div>
            `;
            tunjanganContainer.appendChild(newRow);
        });

        var potonganContainer = document.getElementById('potongan-container');
        var addButtonPotongan = document.getElementById('addPotongan');
        var potonganCount = 1;

        addButtonPotongan.addEventListener('click', function() {
            potonganCount++;
            var newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3', 'potongan-row');
            newRow.innerHTML = `
                <label for="potongan_${potonganCount}" class="col-md-4 col-form-label text-md-end">Potongan ${potonganCount}</label>
                <div class="col-md-6">
                    <select id="potongan_${potonganCount}" class="form-control potongan-select" name="potongan_ids[]" required>
                        <option value="" data-jumlah="0">Pilih Potongan</option>
                        @foreach ($potongan as $potongans)
                            <option value="{{ $potongans->id }}" data-jumlah="{{ $potongans->jumlah_potongan }}">
                                {{ $potongans->nm_potongan }} | Rp. {{ number_format($potongans->jumlah_potongan, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="removePotongan(this)"><i class="fas fa-trash"></i></button>
                </div>
            `;
            potonganContainer.appendChild(newRow);
        });

        window.removeTunjangan = function(btn) {
            btn.closest('.tunjangan-row').remove();
            updateSubtotal();
        };

        window.removePotongan = function(btn) {
            btn.closest('.potongan-row').remove();
            updateSubtotal();
        };

        // Calculate and update gaji pokok and subtotal
        var gajiPokokDisplay = document.getElementById('gaji_pokok_display');
        var gajiPokok = document.getElementById('gaji_pokok');
        var subtotalDisplay = document.getElementById('subtotal_display');
        var subtotal = document.getElementById('subtotal');
        var jamMengajarInput = document.getElementById('jam_mengajar');

        jamMengajarInput.addEventListener('input', updateGajiPokok);
        tunjanganContainer.addEventListener('change', updateSubtotal);
        potonganContainer.addEventListener('change', updateSubtotal);

        function updateGajiPokok() {
            var jamMengajar = parseInt(jamMengajarInput.value) || 0;
            var gajiPokokValue = jamMengajar * 30000;
            gajiPokokDisplay.value = 'Rp. ' + gajiPokokValue.toLocaleString();
            gajiPokok.value = gajiPokokValue;
            updateSubtotal();
        }

        function updateSubtotal() {
            var tunjanganTotal = Array.from(tunjanganContainer.querySelectorAll('.tunjangan-select'))
                .reduce((sum, select) => sum + parseInt(select.selectedOptions[0].dataset.jumlah), 0);
            var potonganTotal = Array.from(potonganContainer.querySelectorAll('.potongan-select'))
                .reduce((sum, select) => sum + parseInt(select.selectedOptions[0].dataset.jumlah), 0);
            var subtotalValue = (parseInt(gajiPokok.value) || 0) + tunjanganTotal - potonganTotal;
            subtotalDisplay.value = 'Rp. ' + subtotalValue.toLocaleString();
            subtotal.value = subtotalValue;
        }
    });
</script>
@endsection
