<!-- resources/views/tunjangan/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Akun</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('akun.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="kd_akun">Kode Akun:</label>
                            <input type="number" class="form-control @error('kd_akun') is-invalid @enderror" id="kd_akun" name="kd_akun" value="{{ old('kd_akun') }}">
                            @error('kd_akun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nm_akun">Nama Akun:</label>
                            <input type="text" class="form-control @error('nm_akun') is-invalid @enderror" id="nm_akun" name="nm_akun" value="{{ old('nm_akun') }}">
                            @error('nm_akun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_akun">Jenis Akun:</label>
                            <input type="text" class="form-control @error('jenis_akun') is-invalid @enderror" id="jenis_akun" name="jenis_akun" value="{{ old('jenis_akun') }}">
                            @error('jenis_akun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total">Jumlah Akun:</label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" id="jenis_akun" name="total" value="{{ old('total') }}">
                            @error('total')
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
