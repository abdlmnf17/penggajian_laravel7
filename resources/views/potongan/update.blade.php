@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Potongan</div>

                <div class="card-body">
                    <form action="{{ route('potongan.update', $potongan->id_potongan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nm_potongan">Nama Potongan:</label>
                            <input type="text" name="nm_potongan" id="nm_potongan" class="form-control" value="{{ $potongan->nm_potongan }}">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_potongan">Jumlah:</label>
                            <input type="number" name="jumlah_potongan" id="jumlah_potongan" class="form-control" value="{{ $potongan->jumlah_potongan }}">
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
