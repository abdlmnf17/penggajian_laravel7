<!-- resources/views/errors/401.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tidak Diizinkan</div>

                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            Anda tidak memiliki izin untuk mengakses halaman ini.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
