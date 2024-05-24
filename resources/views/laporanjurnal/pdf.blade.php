<!DOCTYPE html>
<html>
<head>
    <title>Laporan Jurnal PDF</title>
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
        h2, h3, h4 {
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
    border: 1px solid #1e1e1e;
    text-align: center;

}

td {
    padding: 10px;
    border: 1px solid #353535;
    text-align: center;
}


        tr:nth-child(even) {
            background-color: #fafafa;
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
                border-bottom: 3px solid #ffffff;
                display: block;
                margin-bottom: .625em;
            }
            table td {
                border-bottom: 1px solid #ffffff;
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
        <h2>Laporan Jurnal</h2>
        <h3>MTS HIDAYATUL ISLAMIYAH</h3>
        <h4>Periode {{ $tanggal_mulai }} - {{ $tanggal_selesai }}</h4>
        <table>
            <thead>
                <tr>
                    <th data-label="Tanggal">Tanggal</th>
                    <th data-label="Keterangan">Keterangan</th>
                    <th data-label="Akun">Akun</th>
                    <th data-label="Debit">Debit</th>
                    <th data-label="Kredit">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurnals as $jurnal)
                <tr>
                    <td>{{ $jurnal->gaji->tgl_gaji }}</td>
                    <td>{{ $jurnal->keterangan }}</td>
                    <td>{{ $jurnal->akunDebit->nm_akun }} <br/>{{ $jurnal->akunKredit->nm_akun }}</td>
                    <td>Rp. {{ number_format($jurnal->jumlah_akun_debit, 2, ',', '.') }}</td>
                    <td><br/>Rp. {{ number_format($jurnal->jumlah_akun_kredit, 2, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr align="center">
                    <td colspan="3"><strong>Jumlah</strong></td>
                    <td><strong>Rp. {{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                    <td><strong>Rp. {{ number_format($totalKredit, 2, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
           <br/>
           <br/><br/>

            <p><u><b>Kepala Sekolah</b></u></p>
        </div>
    </div>
</body>
</html>
