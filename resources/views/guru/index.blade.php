@extends('layouts.app')

@section('content')
<div class="col-lg-10 mb-4 mx-auto">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('guru.create') }}" class="btn btn-success float-right">
                <i class="fas fa-plus"></i> Tambah Guru
            </a>
            <h4 class="m-0 font-weight-bold text-success">DAFTAR GURU</h4>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesuksesan -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">#</th>
                        <th style="width: 20%; text-align: center;">Nama Guru</th>
                        <th style="width: 15%; text-align: center;">MAPEL</th>
                        <th style="width: 15%; text-align: center;">Jabatan</th>
                        <th style="width: 30%; text-align: center;">Aksi</th> <!-- Menambahkan lebar kolom untuk tombol aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $index => $guruItem)
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td style="text-align: center;">{{ $guruItem->nm_guru }}</td>
                        <td style="text-align: center;">{{ $guruItem->guru_mapel }}</td>
                        <td style="text-align: center;">{{ $guruItem->nm_jabatan }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('guru.edit', $guruItem->id_guru) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <button class="btn btn-sm btn-danger delete-guru" data-id="{{ $guruItem->id_guru }}" data-toggle="modal" data-target="#confirmDeleteModal">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus guru ini?</p>
                    <input type="hidden" id="guruId" name="guruId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();

        $('.delete-guru').on('click', function() {
            var guruId = $(this).data('id_guru');
            $('#guruId').val(guruId);
        });

        $('#deleteForm').on('submit', function(e) {
            e.preventDefault();
            var guruId = $('#guruId').val();
            var url = "{{ route('guru.delete', ':id_guru') }}";
            url = url.replace(':id_guru', guruId);
            $(this).attr('action', url);
            $(this).unbind('submit').submit();
        });
    });
</script>
@endpush
