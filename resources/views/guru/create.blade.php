@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Guru</div>
                @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="card-body">
                    <form action="{{ route('guru.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nm_guru">Nama Guru:</label>
                            <input type="text" name="nm_guru" id="nm_guru" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="guru_mapel">Mata Pelajaran:</label>
                            <input type="text" name="guru_mapel" id="guru_mapel" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nm_jabatan">Nama Jabatan:</label>
                            <input type="text" name="nm_jabatan" id="nm_jabatan" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
