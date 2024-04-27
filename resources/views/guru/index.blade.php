@extends('layouts.app')

@section('content')
<div class="col-lg-10 mb-4 mx-auto">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('guru.create') }}" class="btn btn-success float-right">
                <i class="fas fa-plus"></i> Tambah Guru
            </a>
            <button class="btn btn-danger float-right mr-2" id="deleteSelected">
                <i class="fas fa-trash"></i> Hapus yang Dipilih
            </button>
            <h4 class="m-0 font-weight-bold text-success">DAFTAR GURU</h4>
        </div>
        <div class="card-body">
            <!-- Display success message -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <form id="deleteForm" action="{{ route('guru.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%;">
                                <input type="checkbox" id="select-all">
                            </th>
                            <th style="width: 10%; text-align: center;">#</th>
                            <th style="width: 20%; text-align: center;">Nama</th>
                            <th style="width: 15%; text-align: center;">NIP</th>
                            <th style="width: 15%; text-align: center;">Jabatan</th>
                            <th style="width: 20%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guru as $guruItem)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_guru[]" value="{{ $guruItem->id }}">
                            </td>
                            <td style="text-align: center;">
                                <img src="{{ asset('storage/' . $guruItem->profile_photo) }}" alt="Profile Photo" style="max-width: 50px; display: block; margin: 0 auto;">
                            </td>
                            <td style="text-align: center;">{{ $guruItem->nama }}</td>
                            <td style="text-align: center;">{{ $guruItem->nip }}</td>
                            <td style="text-align: center;">{{ $guruItem->jabatan }}</td>
                            <td style="text-align: center;">
                                <a href="{{ route('guru.edit', $guruItem->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit <!-- Icon edit -->
                                </a>
                                <a href="{{ route('guru.show', $guruItem->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-info-circle"></i> Detail <!-- Icon detail -->
                                </a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data guru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus guru yang dipilih? Data yang dihapus tidak bisa dikembalikan lagi.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection
