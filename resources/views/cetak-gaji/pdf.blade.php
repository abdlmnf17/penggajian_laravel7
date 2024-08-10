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
            margin: 10px;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 10px auto;
            padding: 15px;
            background-color: #fff;
            border: 2px solid black;
            overflow: hidden;
        }

        .header {
            overflow: hidden;
            /* Clearfix for floated elements */
            margin-bottom: 20px;
        }

        .header img {
            float: left;
            max-width: 65px;
            margin-right: 20px;
        }

        .header .text {
            overflow: hidden;
            text-align: center;
            align-items: center;
            align-content: center;
        }

        .header .text h2,
        .header .text h3 {
            margin: 0;
            padding: 0;
            text-align: center;
            align-items: center;
            align-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 18px;
            border: none;
        }

        th,
        td {
            padding: 3px;
            text-align: left;
        }

        th {
            font-weight: bold;
            border-top: none;
            border-bottom: none;
            border-left: none;
            border-right: none;
        }

        td {
            vertical-align: top;
            border-top: none;
            border-bottom: none;
            border-left: none;
            border-right: none;
        }

        .amount {
            text-align: right;
            white-space: nowrap;
        }

        .section-title {
            font-weight: bold;
            text-align: left;
            padding-top: 8px;
        }

        .section-subtitle {
            font-weight: bold;
            text-align: left;
            padding-bottom: 4px;
        }

        .bottom-border {
            border-bottom: 3px solid #141414;
        }

        .amount-label {
            text-align: right;
            padding-right: 8px;
            white-space: nowrap;
            width: 50px;
        }

        .description {
            white-space: nowrap;
        }

        .indent-label {
            padding-left: 3px;
        }

        .indent-amount {
            padding-left: 8px;
        }

        .signature-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 40px;
        }

        .signature {
            text-align: right;
            font-size: 14px;
        }

        .signature .line {
            border-top: 1px solid #000;
            margin-top: 60px;
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
        <div class="header">
            <img src="{{ public_path('img/hi.jfif') }}" alt="Logo">
            <div class="text">
                <h2>STRUK PEMBAYARAN HONOR</h2>
                <h3>MTs HIDAYATUL ISLAMIYAH</h3>
                <h3>TAHUN PELAJARAN 2022/2023</h3>
            </div>
        </div>

        <table>
            <tbody>
                <tr>
                    <th>Kode/Bulan</th>
                    <td>: {{ $gaji->kd_gaji }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>: {{ $gaji->guru->nm_guru }}</td>
                </tr>
            </tbody>
        </table>

        <div class="section-title">PENERIMAAN</div>
        <table>
            <tbody>
                <tr>
                    <td class="description">I. Honor Mengajar / Jam:</td>
                    <td class="amount-label">{{ $gaji->jam_mengajar }} x Rp. 30.000</td>

                </tr>
                <tr class="bottom-border">
                    <td class="section-subtitle">JUMLAH</td>
                    <td class="amount-label indent-label">Rp</td>
                    <td class="amount indent-amount">{{ number_format($gaji->gaji_pokok, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="section-title">TUNJANGAN</div>
        <table>
            <tbody>
                @foreach ($gaji->tunjangan as $tunjangans)
                    <tr>
                        <td class="description">{{ $loop->iteration }}. {{ $tunjangans->nm_tunjangan }}</td>
                        <td class="amount-label">Rp</td>
                        <td class="amount">{{ number_format($tunjangans->jumlah_tunjangan, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="bottom-border">
                    <td class="section-subtitle">JUMLAH</td>
                    <td class="amount-label indent-label">Rp</td>
                    <td class="amount indent-amount">{{ number_format($totalTunjangan, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="section-title">POTONGAN</div>
        <table>
            <tbody>
                @foreach ($gaji->potongan as $potongans)
                    <tr>
                        <td class="description">{{ $loop->iteration }}. {{ $potongans->nm_potongan }}</td>
                        <td class="amount-label">Rp</td>
                        <td class="amount">{{ number_format($potongans->jumlah_potongan, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="bottom-border">
                    <td class="section-subtitle">JUMLAH</td>
                    <td class="amount-label indent-label">Rp</td>
                    <td class="amount indent-amount">{{ number_format($totalPotongan, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr class="bottom-border">
                    <td class="section-subtitle">SISA PEMBAYARAN</td>
                    <td class="amount-label indent-label">Rp</td>
                    <td class="amount indent-amount">{{ number_format($gaji->sub_total, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="signature-section">
            <div class="signature">
                <p>Jatibaru, {{ $currentDate }}</p>
                <p>Kepala Sekolah</p>
                <br />
                <br />
                <br />
                <p><u>{{ config('app.kepalasekolah', 'Laravel') }}</u></p>
            </div>
        </div>
    </div>
</body>

</html>
