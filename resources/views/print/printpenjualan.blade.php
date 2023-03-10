<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Penjualan</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        table {
            width: 100%;
        }
        h1 {
            text-align: center;
        }
        .text-center {
            text-align: center;
            margin-top: -15px
        }
        th, td {
            width: auto;
        }
        .badge-red {
            padding: 5px;
            background-color: red;
            color: white;
            border-radius: 6px;
            font-weight: bold;
        }
        .badge-blue {
            padding: 5px;
            background-color: blue;
            color: white;
            border-radius: 6px;
            font-weight: bold;
        }
        .page-break {
            page-break-before: always;
        }
        .text-warna {
            color: red;
        }
        .footer {
            margin-top: 2%;
            display: grid;
            grid-auto-columns: 10%;
        }
        .kosong {
            text-align: center;
            margin-top: 30%;
            font-size: 60px;
        }
    </style>
</head>

<body>
    @if (DB::table('penjualans')->where(DB::raw('YEAR(tanggal)'), $id)->exists() || $id == 0)
        <div class="container">
            <header>
                <h1 class="text-center">Laporan Penjualan</h1>
                <p class="text-center">
                    @php
                        setlocale(LC_ALL, 'IND');
                        $data = strftime('%A, %d %B %Y');
                    @endphp
                    Dicetak : <span class="text-warna">{{ $data }}</span>
                </p>
            </header>
            <h3>LAPORAN PENJUALAN LOKAL</h3>
            <table class="table table-bordered">
                <thead>
                    <th class="nopenj">No</th>
                    <th>Kode Penjualan</th>
                    <th class="cust">Nama Customer</th>
                    <th>Tanggal Kirim</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                    @if ($item->jenis == 0)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->customer->nama_customer }}</td>
                            @php
                                setlocale(LC_ALL, 'IND');
                                $tanggalini = date_create($item->tanggal);
                                $tgl =  \Carbon\Carbon::parse($tanggalini)->formatLocalized('%d-%m-%Y');
                            @endphp
                            <td>{{ $tgl }}</td>
                            <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            @if ($item->status == 0)
                                <td class="text-warna">{{ $item->status }}</td>
                            @else 
                                <td>{{ $item->status }}</td>
                            @endif
                        </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="border: 2px solid;">
                        <th colspan="4">Jumlah</th>
                        <th>Rp {{ number_format($pertahun, 0, ',', '.') }}</th>
                        <th colspan="2"></th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6" class="text-warna">Belum Lunas</th>
                        <th class="text-warna">{{ $belum }}</th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6">Sudah Lunas</th>
                        <th>{{ $lunas }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="page-break">
            <h3>LAPORAN PENJUALAN INTERNASIONAL</h3>
            <table class="table table-bordered">
                <thead>
                    <th class="nopenj">No</th>
                    <th>Kode Penjualan</th>
                    <th class="cust">Nama Customer</th>
                    <th>Tanggal Kirim</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                    @if ($item->jenis == 1)      
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->customer->nama_customer }}</td>
                            @php
                                setlocale(LC_ALL, 'IND');
                                $tanggalini = date_create($item->tanggal);
                                $tgl =  \Carbon\Carbon::parse($tanggalini)->formatLocalized('%d-%m-%Y');
                            @endphp
                            <td>{{ $tgl }}</td>
                            <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            @if ($item->status == 0)
                                <td class="text-warna">{{ $item->status }}</td>
                            @else 
                                <td>{{ $item->status }}</td>
                            @endif
                        </tr>
                    @endif
                        
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="border: 2px solid;">
                        <th colspan="4">Jumlah</th>
                        <th>$ {{ number_format($pertahun2, 0, ',', '.') }}</th>
                        <th colspan="2"></th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6" class="text-warna">Belum Lunas</th>
                        <th class="text-warna">{{ $belum2 }}</th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6">Sudah Lunas</th>
                        <th>{{ $lunas2 }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="page-break">
            <h1 class="text-center">Data Penjualan Tahunan Lokal @if (!$id == 0) {{ $id }} @endif</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'IND');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
            <table class="table table-bordered">
                <thead>
                    <th>Bulan</th>
                    <th class="cust">Total</th>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            $result[$i] = 0;
                            $hasil[$i] = 0;
                        @endphp
                    @endfor

                    @foreach ($year as $dt)
                    @if ($dt->jenis == 0)
                        @php
                            $bulan = date('n', strtotime($dt->tanggal));
                            $result[$bulan] += $dt->jumlah;
                        @endphp
                    @endif
                    @endforeach
                    
                    @foreach ($penjualan as $pj)
                    @if ($pj->jenis == 0)
                        @php 
                            $bulan = date('n', strtotime($pj->tanggal));
                            $hasil[$bulan] += $pj->jumlah;
                        @endphp
                    @endif
                    @endforeach

                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            setlocale(LC_ALL, 'IND');
                            $month = strftime('%B', mktime(0, 0, 0, $i, 10)); 
                        @endphp        
                        <tr>
                            <td>{{ $month }}</td>
                            <td class="fw-bold">
                                
                                @if (!$id == 0)
                                Rp {{ number_format($result[$i], 0, ',', '.') }}
                                @else
                                Rp {{ number_format($hasil[$i], 0, ',', '.') }}
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot>
                    <th>Jumlah</th>
                    <th>Rp {{ number_format($pertahun, 0, ',', '.') }}</th>
                </tfoot>
            </table>
        </div>
        <div class="page-break">
            <h1 class="text-center">Data Penjualan Tahunan Inter @if (!$id == 0) {{ $id }} @endif</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'IND');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
            <table class="table table-bordered">
                <thead>
                    <th>Bulan</th>
                    <th class="cust">Total</th>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            $result[$i] = 0;
                            $hasil[$i] = 0;
                        @endphp
                    @endfor

                    @foreach ($year as $dt)
                    @if ($dt->jenis == 1)
                        @php
                            $bulan = date('n', strtotime($dt->tanggal));
                            $result[$bulan] += $dt->jumlah;
                        @endphp
                    @endif
                    @endforeach

                    @foreach ($penjualan as $pj)
                    @if ($pj->jenis == 1)
                        @php 
                            $bulan = date('n', strtotime($pj->tanggal));
                            $hasil[$bulan] += $pj->jumlah;
                        @endphp
                    @endif
                    @endforeach

                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            setlocale(LC_ALL, 'IND');
                            $month = strftime('%B', mktime(0, 0, 0, $i, 10)); 
                        @endphp        
                        <tr>
                            <td>{{ $month }}</td>
                            <td class="fw-bold">
                                @if (!$id == 0)
                                $ {{ number_format($result[$i], 0, ',', '.') }}
                                @else
                                $ {{ number_format($hasil[$i], 0, ',', '.') }}
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot>
                    <th>Jumlah</th>
                    <th>$ {{ number_format($pertahun2, 0, ',', '.') }}</th>
                </tfoot>
            </table>
        </div>
    @else
    <h1 class="kosong">DATA TIDAK DITEMUKAN</h1>
    @endif
</body>

</html>
