@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header py-3">

                        <a href="{{ route('cetak', $gaji->id) }}" class="btn btn-primary float-right">Cetak Slip Gaji</a>
                        <h4><b>SLIP GAJI</b></h4>
                        </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Kode Gaji:</strong>
                                        <p>{{ $gaji->kd_gaji }}</p>
                                    </div>

                                    <div class="col-md-6 text-end">
                                        <strong>Tanggal Gaji:</strong>
                                        <p>{{ $gaji->tgl_gaji }}</p>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Guru:</strong>
                                        <p>{{ $gaji->guru->nm_guru }}</p>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <strong>Mata Pelajaran:</strong>
                                        <p>{{ $gaji->guru->guru_mapel }}</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <strong>Jam Mengajar:</strong>
                                        <p>{{ $gaji->jam_mengajar }} Jam</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Gaji Pokok:</strong>
                                        <p>Rp. {{ number_format($gaji->gaji_pokok, 2, ',', '.') }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Tunjangan:</strong>
                                        <ul>
                                            @foreach ($gaji->tunjangan as $tunjangan)
                                                <li>{{ $tunjangan->nm_tunjangan }}: Rp.
                                                    {{ number_format($tunjangan->jumlah_tunjangan, 2, ',', '.') }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Potongan:</strong>
                                        <ul>
                                            @foreach ($gaji->potongan as $potongan)
                                                <li>{{ $potongan->nm_potongan }}: Rp.
                                                    {{ number_format($potongan->jumlah_potongan, 2, ',', '.') }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 text-end">
                                        <strong>Total Gaji:</strong>
                                        <p class="h4">Rp. {{ number_format($gaji->sub_total, 2, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
