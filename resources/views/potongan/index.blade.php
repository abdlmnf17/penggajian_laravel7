@extends('layouts.app')

@section('content')
<div class="col-lg-9 mb-10 mx-auto">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('potongan.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Tambah Potongan
            </a>
            <h4 class="m-15 font-weight-bold">DAFTAR POTONGAN</h4>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesuksesan -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
            @endif

            <table id="dataTable" class="table table-bordered" cellspacing="1"><br/>
                <thead>
                    <tr align="center">
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Nama Potongan</th>
                        <th style="width: 15%">Jumlah</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($potongan as $index => $potonganItem)
                    <tr align="center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $potonganItem->nm_potongan }}</td>
                        <td>Rp. {{ $potonganItem->jumlah_potongan }}</td>
                        <td>
                            <a href="{{ route('potongan.edit', $potonganItem->id_potongan) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $potonganItem->id_potongan }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="confirmDeleteModal{{ $potonganItem->id_potongan }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="{{ route('potongan.delete', $potonganItem->id_potongan) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus potongan ini?</p>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
