<!DOCTYPE html>
<html>

<head>
    <title>Laporan Gaji</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #ffffff;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3,
        h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            padding: 10px;
            border: 1px solid #2dcaff;
            text-align: center;
            background-color: #3ddfff;
            color: rgb(41, 41, 41);
            /* Menjadikan teks pada elemen th warna putih */
        }

        td {
            padding: 10px;
            border: 1px solid #3dc2ff;
            text-align: center;
        }


        tr:nth-child(even) {
            background-color: #d8d8d8;
        }

        @media only screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Laporan Penggajian</h2>
        <h3>{{ config('app.sekolah', 'MTS HIDAYATUL ISLAMIYAH') }}</h3>
        <h4>Periode: {{ $tanggal_mulai }} sampai {{ $tanggal_selesai }}</h4>
        <table>
            <thead>
                <tr>
                    <th data-label="Kode Gaji">INV</th>
                    <th data-label="Tanggal Gaji">Tanggal</th>
                    <th data-label="Nama Guru">Guru</th>
                    <th data-label="Mata Pelajaran">Studi</th>
                    <th data-label="Honor Mengajar">Jam Mengajar</th>
                    <th data-label="Gaji Pokok">Gaji Pokok</th>
                    <th data-label="Tunjangan">Tunjangan</th>
                    <th data-label="Potongan">Potongan</th>
                    <th data-label="Total Diterima">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gaji as $item)
                    <tr>
                        <td>{{ $item->kd_gaji }}</td>
                        <td>{{ $item->tgl_gaji }}</td>
                        <td>{{ $item->guru->nm_guru }}</td>
                        <td>{{ $item->guru->guru_mapel }}</td>
                        <td>{{$item->jam_mengajar}}</td>
                        <td>Rp. {{ number_format($item->gaji_pokok, '2', ',', '.') }}</td>
                        <td>
                            @foreach ($item->tunjangan as $tunjangans)
                                {{ $tunjangans->nm_tunjangan }}<br>
                                Rp. {{ number_format($tunjangans->jumlah_tunjangan, '2', ',', '.') }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($item->potongan as $potongans)
                                {{ $potongans->nm_potongan }}<br>
                                Rp. {{ number_format($potongans->jumlah_potongan, 2, ',', '.') }}
                            @endforeach
                        </td>
                        <td>Rp. {{ number_format($item->sub_total, '2', ',', '.') }}</td>
                    </tr>


                @endforeach
                <tr align="center">
                    <td colspan="8"><strong>Total Pembayaran Gaji {{ $tanggal_mulai }} sampai
                            {{ $tanggal_selesai }} </strong></td>
                    <td><strong>Rp. {{ number_format($totalGajiKeseluruhan, 2, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
        <br/>

    ______________________________ <br/><br/>
            Kepala Sekolah
    </div>
</body>

</html>
