<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honor Gaji</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            position: relative;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .watermark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ public_path('img/hi.jfif') }}') center center no-repeat;
            background-size: cover;
            opacity: 0.1;
            z-index: -1;
        }

        h2,
        h3 {
            text-align: center;
            margin: 0;
            padding: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ffffff;
        }

        th {

            font-weight: bold;
            text-align: left;
        }

        .list-group {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .list-group-item {
            padding: 5px 0;
            border-bottom: 1px solid #ffffff;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .signature-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 40px;
        }

        .signature {
            text-align: right;
        }

        .signature .line {
            border-top: 1px solid #000;
            margin-top: 60px;
        }

        .total-row th,
        .total-row td {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @php
        setlocale(LC_TIME, 'Indonesian_Indonesia.1252');
        $currentDate = strftime('%e %B %Y', time());

        $totalTunjangan = 0;
        foreach ($gaji->tunjangan as $tunjangans) {
            $totalTunjangan += $tunjangans->jumlah_tunjangan;
        }

        $totalPotongan = 0;
        foreach ($gaji->potongan as $potongans) {
            $totalPotongan += $potongans->jumlah_potongan;
        }
    @endphp
    <div class="container">
        <div class="watermark"></div>
        <h2>STRUK PEMBAYARAN HONOR</h2>
        <h2>MTs HIDAYATUL ISLAMIYAH</h2>
        <h3>TAHUN PELAJARAN 2024</h3>

        <table>
            <tbody>
                <tr>
                    <th scope="row">Kode Gaji</th>
                    <td>{{ $gaji->kd_gaji }}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Gaji</th>
                    <td>{{ $gaji->tgl_gaji }}</td>
                </tr>
                <tr>
                    <th scope="row">Nama</th>
                    <td><b>{{ $gaji->guru->nm_guru }}</b></td>
                </tr>
                <tr>
                    <th scope="row">Jabatan</th>
                    <td>{{ $gaji->guru->nm_jabatan }}</td>
                </tr>
                <tr>
                    <th scope="row">Bidang Studi</th>
                    <td>{{ $gaji->guru->guru_mapel }}</td>
                </tr>
                <tr>
                    <th scope="row">Honor Mengajar / Jam</th>
                    <td><b>{{ $gaji->jam_mengajar }} x 30.000</b></td>
                </tr>
                <tr class="total-row">
                    <th scope="row"><u>JUMLAH</u></th>
                    <td><u>Rp. {{ number_format($gaji->gaji_pokok, 2, ',', '.') }}</u></td>
                </tr>
                <tr>
                    <th scope="row">Tunjangan</th>
                    <td>
                        <ul class="list-group">
                            @foreach ($gaji->tunjangan as $tunjangans)
                                <li class="list-group-item">{{ $tunjangans->nm_tunjangan }}: Rp.
                                    {{ number_format($tunjangans->jumlah_tunjangan, 2, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>

                <tr class="total-row">
                    <th scope="row"><u>JUMLAH TUNJANGAN</u></th>
                    <td>Rp. <u><b>{{ number_format($totalTunjangan, 2, ',', '.') }}</b></u></td>
                </tr>

                <tr>
                    <th scope="row">Potongan</th>
                    <td>
                        <ul class="list-group">
                            @foreach ($gaji->potongan as $potongans)
                                <li class="list-group-item">{{ $potongans->nm_potongan }}: Rp.
                                    {{ number_format($potongans->jumlah_potongan, 2, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr class="total-row">
                    <th scope="row"><u>JUMLAH POTONGAN</u></th>
                    <td>Rp. <u><b>{{ number_format($totalPotongan, 2, ',', '.') }}</b></u></td>
                </tr>
                <tr class="total-row">
                    <th scope="row"><u>JUMLAH BERSIH</u></th>
                    <td>Rp. <u><b>{{ number_format($gaji->sub_total, 2, ',', '.') }}</b></u></td>
                </tr>
            </tbody>
        </table>

        <div class="signature-section">
            <div class="signature">
                <p>Jatibaru, <?php echo $currentDate; ?></p>
                <p>Kepala Sekolah</p>
                <p></p>
               <br/>
               <br />
               <br/>

                <p><u>Ahmad Lutfi, S.Pd. I</u></p>
            </div>
        </div>
    </div>
</body>

</html>
