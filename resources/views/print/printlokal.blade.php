<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Lokal</title>
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @font-face {
            font-family: 'OpenS-Regular';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/OpenSauceSans-Regular.ttf') }}) format("truetype");
        }
        @font-face {
            font-family: 'OpenS-Bold';
            font-style: normal;
            font-weight: 700;
            src: url({{ storage_path('fonts/OpenSauceSans-Bold.ttf') }}) format("truetype");
        }
        @font-face {
            font-family: 'Mont-Bold';
            font-style: normal;
            font-weight: bold;
            src: url({{ storage_path('fonts/montserratbold.ttf') }}) format("truetype");
        }

        body, html {
            height: 100%;
            margin: 0;
        }
        .bg {
            background-image: url({{ public_path('isi/assets/img/background-print.png') }});
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .content {
            padding: 45px;
       }

        table.fipinTable {
            border: 0px solid #A40808;
            background-color: #b4b4b4;
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        table.fipinTable td, table.fipinTable th {
            border: 0px solid #AAAAAA;
            padding: 3px 2px;
        }
        table.fipinTable tbody td {
            font-size: 13px;
        }
        table.fipinTable tr:nth-child(even) {
            background: #efefef;
        }
        table.fipinTable thead {
            background: #9901bb;
        }
        table.fipinTable thead th {
            font-family: 'OpenS-Bold';
            font-size: 16px;
            font-weight: 700;
            color: #FFFFFF;
            text-align: center;
        }
        table.fipinTable tfoot td {
            font-size: 13px;
        }
        table.fipinTable tfoot .links {
            text-align: right;
        }
        table.fipinTable tfoot .links a{
            display: inline-block;
            background: #FFFFFF;
            color: #A40808;
            padding: 2px 8px;
            border-radius: 5px;
        }

        td {
            font-family: 'OpenS-Regular';  
        }

        .badge-red {
            padding: 12px;
            background-color: #820004;
            color: rgb(255, 255, 255);
            border-radius: 6px;
            font-family: 'Mont-Bold';
            font-weight: bold;
            text-align: left;
        }
        .badge-outline {
            padding: 6px;
            /* background-color: black; */
            border: 5px solid #ad392b;
            border-style: double;
            color: #548a51;
            border-radius: 6px;
            font-family: 'Mont-Bold';
            font-weight: bold;
            text-align: center;
            letter-spacing: 1px;
        }

        .block {
            padding: 12px;
            background-color: #efefef;
            color: black;
            border-radius: 6px;
            font-family: 'Mont-Bold';
            font-weight: bold;
            text-align: left;
        }
        .block2 {
            padding: 7px;
            background-color: #dd541d;
            color: #ffda2b;
            font-family: 'Mont-Bold'; 
            font-weight: 700;
            font-size: 20px;
            text-align: center;
            border-radius: 12px;
            line-height: 100%;
            letter-spacing: 10%;
        }

        .col {
            float: left;
            padding: 10px;
        }
        
        
        .left {
            width: 32%;
        }

        .right {
            width: 40%;
            margin-left: 0;
        }
        .sebelahkiri, .sebelahkanan {
            width: 50%;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .kiri {
            margin-top: -2%;
            margin-left: 20%;
            width: 20%;
            text-align: center;
        }

        .kanan { 
            margin-left: 2%;
            width: 50%;
        }


        .pinggir {
            width: 29%;
        }

        .font {
            font-family: 'Mont-Bold';
            letter-spacing: 10px;
            text-align: center;
            font-weight: 700;
        }
        .sub3 {
            font-family: 'Mont-Bold';
            font-weight: 700;
            font-size: 13px;
        }
        .sub {
            font-family: 'Mont-Bold';
            color: blue;
            font-weight: 700;
            text-align: center;
            margin: -20px 0 0 -5px;
            letter-spacing: 2.5px;
            font-size: 15px;
        }

        .sub2 {
            font-family: 'OpenS-Regular'; 
            font-size: 12px;
            margin: -6px 0 0 94px;
        }
        .bill2 {
            font-family: 'Mont-Bold';
            font-weight: 700;
            font-size: 13px;
        }
        .bill {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
        }
        
        .pay {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
        }

        
        footer {
            position: fixed;
            color: white;
            bottom: 0px; 
            left: 0px; 
            right: 0px;
            height: 50px; 
            text-align: center;
            font-family: 'OpenS-Regular';
            letter-spacing: 2px;
        }

        .container-grid {
            display: grid;
        }

        .item-grid {
            grid-template-rows: 50px 50px 50px;
            margin-left: 470px;
            line-height: 10px;
            margin-top: -20px;
        }
       
       
</style>
<body>
    @php
    function singkat_angka($n, $presisi=1) {
            if ($n < 900) {
                $format_angka = number_format($n, $presisi, ".",",");
                $simbol = '';
            } else if ($n < 900000000000) {
                $format_angka = number_format($n / 1000, $presisi, ".",",");
                $simbol = 'K';
            } else {
                $format_angka = number_format($n / 1000000000000, $presisi, "." ,",");
                $simbol = 'T';
            }
        
            if ( $presisi > 0 ) {
                $pisah = '.' . str_repeat( '0', $presisi );
                $format_angka = str_replace( $pisah, '', $format_angka );
            }
            
            return $format_angka . $simbol;
        }
    @endphp
    <div class="bg">
        <div class="content">
            <div class="row" style="margin-top:50px">
                <div class="col sebelahkiri">
                    <img src="{{ public_path('isi/assets/img/logo-f.png') }}" alt="logo" width="110px" srcset="">
                </div>
                <div class="col sebelahkanan" style="margin-top:-37px">
                    <h1 class="font">INVOICE</h1>
                    @foreach ($kode as $item)
                    <p class="sub">IICO {{ $item->kode_faktur }}</p>
                    <br>
                         @php
                            $tanggal = date_create($item->tanggal_faktur);
                            $hasiltanggal =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%b %d, %Y');
        
                            $tambahtanggal  = date('Y-m-d', strtotime($item->tanggal_faktur . ' + 1 day'));
                            $tanggal2 = date_create($tambahtanggal);
                            $hasiltanggal2 =  \Carbon\Carbon::parse($tanggal2)->formatLocalized('%b %d, %Y');
                        @endphp
                    <p class="sub2" style="margin-top:-14px">Issued Date <span>: {{ $hasiltanggal }}</span></p>
                    @endforeach
                    <p class="sub2" style="margin-top:-1px">Due Date <span style="margin-left:15px;">: {{ $hasiltanggal2 }}</span></p>
                </div>
            </div>
    
            <div class="row">
                <div class="col left" style="margin-top: 5px; margin-left:28px;">
                    <p class="bill2">Bill to: </p>
                    @foreach ($kode as $item)
                    <p class="bill" style="margin-top: -18px; margin-bottom:18px; color:black; line-height:22px">{{ $item->nama_customer }}</p>
                    <p class="bill" style="margin-top: -19px; color:black; line-height:13px">{{ $item->alamat_customer }}</p>
                    @if ($item->telepon_customer == '-')
                        <p></p>
                    @else
                        <p class="bill" style="margin-top: -17px; color:black; line-height:19px">{{ $item->telepon_customer }}</p>
                    @endif
                    @endforeach
                </div>
                <div class="col kanan">
                    <p class="sub3" style="margin-top:17px;">Payable to:</p>
                    <p class="pay" style="margin-top:-9px;">BCA - Ramadhana D. A</p>
                    <p class="sub3" style="margin-top:-5px;">Account Number:</p>
                    <p class="pay" style="margin-top:-11px;">385 069 0595</p>
                </div>
            </div>
            <div class="row">
                <table class="fipinTable">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th style="text-align: left">Qty</th>
                            <th style="text-align: left">Price</th>
                            <th>Discount</th>
                            <th style="text-align: left">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td style="text-align: left; padding-left:10px;">{{ $item->nama_barang }}</td>
                            <td style="text-align: left">{{ $item->qty }}</td>
                            <td style="text-align: left">@ {{ singkat_angka($item->harga) }}</td>
                            @if (!$item->diskon == 0)
                                <td>{{ $item->diskon }} %</td>
                            @else
                                <td>-</td>
                            @endif
                            <td style="text-align: left">{{ singkat_angka($item->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($kode as $ket)
                    <p style="font-family: 'OpenS-Regular'; color:red; font-size:12px;">NB : {{ $ket->ket_faktur }}</p>
                @endforeach
            </div>
            <div class="container-grid" style="margin-top:30px;">
                <div class="item-grid">
                    @if (!$item->charge == 0)
                        <p class="block">
                            ADMIN FEE <span style="margin-left: 40px">{{ singkat_angka($item->charge) }}</span>
                        </p>
                    @endif
                    
                </div>
                <div class="item-grid">
                    @foreach ($kode as $item)
                    <p class="block">
                        GRAND TOTAL<span style="margin-left: 20px">{{ singkat_angka($item->total_final) }}</span>
                    </p>
                    @endforeach
                </div>
                <div class="item-grid">
                    <p class="badge-red">
                        MINIMUM DP  <span style="margin-left: 25px">{{ singkat_angka($dp) }}</span>
                    </p>
                </div>
            </div>
            <div class="row" style="height:auto; margin-top: 0px;">
                <p class="block2" >Harap cantumkan nomor Invoice berwarna biru
                    <br> dalam berita transfer saat melakukan payment
                </p>
            </div>
            <div class="row" style="margin-top: -20px">
                <p class="badge-outline">Pengerjaan 8-15 hari kerja (order normal qty &lt; 100pcs & non event)</p>
            </div>
            <footer>
                <p>iniitu • +62 89 628 781 916 • iniitumailnya@gmail.com • LINE @zye3506l </p>
            </footer>
        </div>
    </div>
</body>
</html>