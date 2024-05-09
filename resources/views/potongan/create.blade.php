@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Potongan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('potongan.store') }}">
                        @csrf

                        
                        <div class="form-group">
                            <label for="wali_kelas">Nama Potongan:</label>
                            <input type="text" class="form-control @error('nm_potongan') is-invalid @enderror" id="nm_potongan" name="nm_potongan" value="{{ old('nm_potongan') }}">
                            @error('nm_potongan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kependidikan">Jumlah Potongan:</label>
                            <input type="number" class="form-control @error('jumlah_potongan') is-invalid @enderror" id="jumlah_potongan" name="jumlah_potongan" value="{{ old('jumlah_potongan') }}">
                            @error('jumlah_potongan')
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
