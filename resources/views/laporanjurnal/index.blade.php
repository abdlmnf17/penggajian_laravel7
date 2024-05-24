@extends('layouts.app')

@section('content')

    <div class="col-lg-9 mb-4 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-15 font-weight-bold">{{ __('Laporan Jurnal') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jurnal.laporan.pdf') }}" method="POST">
                    @csrf
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-4">
                            <label for="tanggal_mulai">Periode Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tanggal_selesai">Periode Selesai:</label>
                            <input type="date" name="tanggal_selesai" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm">Cetak Laporan</button>
                        </div>
                    </div>
                </form>
                <br />
                <br />


            </div>
        </div>
    </div>

@endsection
