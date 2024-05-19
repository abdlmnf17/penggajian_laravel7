@extends('layouts.app')

@section('content')
<div class="col-lg-10 mb-10 mx-auto">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('jurnal.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Tambah Jurnal
            </a>
            <h4 class="m-15 font-weight-bold">Entri Jurnal</h4>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesuksesan -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger" role="alert"> <!-- Mengubah class "alert-error" menjadi "alert-danger" -->
                {{ session('error') }}
            </div>
            @endif

            <table id="dataTable" class="table table-bordered" cellspacing="1"><br />
                    <thead>
                        <tr align="center">
                            <th style="width: 15%">Tanggal</th>
                            <th style="width: 30%">Keterangan</th>
                            <th style="width: 15%">Akun</th>
                            <th style="width: 20%">Debit</th>
                            <th style="width: 25%">Kredit</th>
                            <th style="width: 25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurnals as $jurnal)
                        <tr align="justify">
                            <td>{{ $jurnal->gaji->tgl_gaji}} </td>
                          
                            <td>{{ $jurnal->keterangan }}</td>
                            <td>{{ $jurnal->akunDebit->nm_akun }} <br/><hr/>{{ $jurnal->akunKredit->nm_akun }}</td>
                            <td>Rp. {{ number_format($jurnal->jumlah_akun_debit, 2, ',', '.') }}</td>
                            <td><br/>Rp. {{ number_format($jurnal->jumlah_akun_kredit, 2, ',', '.') }}</td>
                            <td>   <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $jurnal->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button></td>
                        </tr>

                        <div class="modal fade" id="confirmDeleteModal{{ $jurnal->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="{{ route('jurnal.destroy', $jurnal->id) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus jurnal ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        <tr align="center">
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong>Rp. {{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                            <td><strong>Rp. {{ number_format($totalKredit, 2, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>



                </table>
        </div>
    </div>
</div>
@endsection
