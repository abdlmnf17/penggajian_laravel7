<!-- resources/views/tunjangan/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Tunjangan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tunjangan.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="wali_kelas">Nama Jabatan:</label>
                            <input type="text" class="form-control @error('nm_tunjangan') is-invalid @enderror" id="nm_tunjangan" name="nm_tunjangan" value="{{ old('nm_tunjangan') }}" required>
                            @error('nm_tunjangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kependidikan">Jumlah Tunjangan:</label>
                            <input type="number" class="form-control @error('jumlah_tunjangan') is-invalid @enderror" id="jumlah_tunjangan" name="jumlah_tunjangan" value="{{ old('jumlah_tunjangan') }}" required>
                            @error('jumlah_tunjangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
