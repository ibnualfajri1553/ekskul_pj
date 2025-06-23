<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Ekstrakurikuler</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 40px;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            width: 70px;
            height: 70px;
        }

        .header .title {
            flex: 1;
            text-align: center;
        }

        h2 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
        }

        .subheading {
            margin-bottom: 10px;
        }

        .subheading span {
            font-weight: bold;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            table-layout: fixed;
            word-wrap: break-word;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
        }

        .ttd {
            margin-top: 50px;
            width: 100%;
            text-align: right;
            font-size: 11pt;
        }

        .ttd .nama {
            margin-top: 60px;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('images/logo-smpn13.png') }}" alt="Logo">
        <div class="title">
            <h2>EKTRAKURIKULER SMPN 13 BANJARMASIN</h2>
        </div>
    </div>

    <div class="subheading">
        <strong>LAPORAN DATA EKSTRAKURIKULER</strong><br>
        <span>Tanggal Cetak</span> : {{ \Carbon\Carbon::now()->format('d-m-Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 9%;">No</th>
                <th style="width: 18%;">Nama Ekskul</th>
                <th style="width: 18%;">Pembina</th>
                <th style="width: 18%;">Pelatih</th>
                <th style="width: 22%;">Visi & Misi</th>
                <th style="width: 20%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskul as $i => $item)
                <tr>
                    <td align="center">{{ $i + 1 }}</td>
                    <td>{{ $item->nama_eskul }}</td>
                    <td>{{ $item->pembina->nama_pembina ?? '-' }}</td>
                    <td>{{ $item->pelatih->nama_pelatih ?? '-' }}</td>
                    <td>
                        <strong>Visi:</strong> {{ $item->visi ?? '-' }}<br>
                        <strong>Misi:</strong> {{ $item->misi ?? '-' }}
                    </td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <p><strong>Kepala</strong> SMPN 13 Banjarmasin</p>
        <p class="nama">(....................................................)</p>
    </div>

</body>
</html>
