@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Gaji</div>

                <div class="card-body">
                    <form action="{{ route('guru.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="kd_gaji">Kode_Gaji:</label>
                            <input type="text" name="kd_gaji_gaji" id="kd_gaji" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tgl_gaji">Tanggal Gaji:</label>
                            <input type="text" name="tgl_gaji" id="tgl_gaji" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jam_mengajar">Jam Mengajar:</label>
                            <input type="date" name="jam_mengajar" id="jam_mengajar" class="form-control">
                        </div>

                       
                        <div class="form-group">
                            <label for="id_tunjangan">ID Tunjangan:</label>
                            <input type="text" name="id_tunjangan" id="id_tunjangan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="id_potongan">ID Potongan:</label>
                            <input type="text" name="id_potongan" id="id_potongan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="id_guru">ID Guru:</label>
                            <input type="text" name="id_potongan" id="id_guru" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="gaji_pokok">Gaji Pokok:</label>
                            <input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="sub_total">Sub Total:</label>
                            <input type="text" name="sub_total" id="sub_total" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
