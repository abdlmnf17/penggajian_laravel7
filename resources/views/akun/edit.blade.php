@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Akun</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('akun.update', $akun->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="kd_akun">Kode Akun:</label>
                                <input type="number" class="form-control @error('kd_akun') is-invalid @enderror"
                                    id="kd_akun" name="kd_akun" value="{{ $akun->kd_akun }}">
                                @error('kd_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nm_akun">Nama Akun:</label>
                                <input type="text" class="form-control @error('nm_akun') is-invalid @enderror"
                                    id="nm_akun" name="nm_akun" value="{{ $akun->nm_akun }}">
                                @error('nm_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_akun">Jenis Akun:</label>
                                <input type="text" class="form-control @error('jenis_akun') is-invalid @enderror"
                                    id="jenis_akun" name="jenis_akun" value="{{ $akun->jenis_akun }}">
                                @error('jenis_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total">Jumlah Akun:</label>
                                <input type="text" class="form-control @error('total') is-invalid @enderror"
                                    id="total" name="total" value="{{ $akun->total }}">
                                @error('total')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
