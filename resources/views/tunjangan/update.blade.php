@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Tunjangan</div>

                <div class="card-body">
                    <form action="{{ route('tunjangan.update', $tunjangan->id_tunjangan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nm_guru">Nama Tunjangan:</label>
                            <input type="text" name="nm_tunjangan" id="nm_tunjangan" class="form-control" value="{{ $tunjangan->nm_tunjangan }}">
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah_tunjangan" id="jumlah_tunjangan" class="form-control" value="{{ $tunjangan->jumlah_tunjangan }}">
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
