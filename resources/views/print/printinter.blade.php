<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Inter</title>
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
        table.fipinTable {
            border: 0px solid #A40808;
            background-color: #94DDF0;
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
            background: #C0F2FF;
        }
        table.fipinTable thead {
            background: #9902BC;
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

        .right {
            position: relative;
        }

        .right .block {
            position: absolute;
            right: -191px;
        }

        td {
            font-family: 'OpenS-Regular';  
        }

        .badge-red {
            padding: 5px;
            background-color: #820004;
            color: white;
            border-radius: 6px;
            font-family: 'Mont-Bold';
            font-weight: bold;
        }
        .badge-outline {
            padding: 5px;
            /* background-color: black; */
            border: 5px solid #ad392b;
            border-style: double;
            color: #548a51;
            border-radius: 6px;
            font-family: 'Mont-Bold';
            font-weight: bold;
            text-align: center;
            height: auto;
        }

        .block {
            padding: 5px;
            background-color: #c1f3fe;
            color: black;
            font-family: 'OpenS-Bold'; 
            font-weight: bold;
        }
        .block2 {
            padding: 5px;
            background-color: #dd541d;
            color: #ffda2b;
            font-family: 'Mont-Bold'; 
            font-weight: 700;
            font-size: 22px;
            text-align: center;
            border-radius: 12px;
        }

        .col {
            float: left;
            padding: 10px;
        }
        
        .left {
            width: 32%;
        }

        .right {
            width: 30%;
            margin-left: 20px;
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
            letter-spacing: 3px;
            font-size: 15px;
        }

        .sub2 {
            font-family: 'OpenS-Regular'; 
            font-size: 12px;
            margin: -6px 0 0 115px;
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
            text-align: center;
            font-family: 'OpenS-Regular';
            letter-spacing: 2px;
        }
       
</style>
<body>
    <div class="row">
        <div class="col sebelahkiri">
            <img src="{{ public_path('isi/assets/img/logo-f.png') }}" alt="logo" width="110px" srcset="">
        </div>
        <div class="col sebelahkanan" style="margin-top:-20px">
            <h1 class="font">INVOICE</h1>
            @foreach ($kode as $item)
            <p class="sub">IICO {{ $item->invoice_code }}</p>
            <br>
            <p class="sub2" style="margin-top:-14px">Issued : {{ $item->invoice_date }}</p>
            @endforeach
            <p class="sub2">Due : On Receipt</p>
        </div>
    </div>
    <div class="row">
        <div class="col left" style="margin-top: 5px; margin-left:28px;">
            <p class="bill2">Bill To : </p>
            @foreach ($kode as $item)
            <p class="bill" style="margin-top: -18px; margin-bottom:18px; color:black; line-height:15px">{{ $item->nama_customer }}</p>
            <p class="bill" style="margin-top: -19px; color:black; line-height:13px">{{ $item->alamat_customer }}</p>
            <p class="bill" style="margin-top: -17px; color:black; line-height:16px">{{ $item->telepon_customer }}</p>
            @endforeach
        </div>
        <div class="col kanan">
            <p class="sub3" style="margin-top:18px;">Payable to :</p>
            <p class="pay" style="margin-top:-17px;">BCA - Ari Gunawan Jatmiko</p>
            <p class="sub3" style="margin-top:-13px;">Account Number :</p>
            <p class="pay" style="margin-top:-17px;">06206148403</p>
        </div>
    </div>
    <div class="row">
        <table class="fipinTable">
            <thead>
                <tr>
                    <th>Item Description</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    
                <tr>
                    <td style="text-align: left; padding-left:10px;">{{ $item->nama_barang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>$ {{ $item->harga_dollar }}</td>
                    <td>$ {{ $item->subtotal }}</td>
                </tr>
                @endforeach
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-left:10px;">Ceramic Sheraton</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col right" style="margin-left:40%;">
            
            <p style="display:inline">
                <span class="badge-red">DP MINIM 50% $ {{ $dp }}</span>
                
            </p>
            @foreach ($kode as $item)
            <p style="display:inline">
                <span class="block">GRAND TOTAL $ {{ $item->total_finale }}</span>
            </p>
            @endforeach
        </div>
    </div>
    <div class="row" style="height:auto;">
        <p class="block2">Harap cantumkan nomor Invoice berwarna biru
            <br> dalam berita transfer saat melakukan payment
        </p>
    </div>
    <div class="row" style="margin-top: -25px">
        <p class="badge-outline">Pengerjaan 8-15 hari kerja (bisa lebih lama jika orderan > 100 pcs)</p>
    </div>
    <footer style="margin-top: -25px">
        <p>iniitu • +62 89 628 781 916 • iniitumailnya@gmail.com • LINE @zye3506l </p>
    </footer>
</body>
</html>