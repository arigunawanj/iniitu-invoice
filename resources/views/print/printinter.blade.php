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
            background-color: #94DDF0;
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
            bottom: -32px; 
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
            margin-left: 480px;
            line-height: 10px;
            margin-top: -20px;
        }
       
</style>
<body>
    <div class="row">
        <div class="col sebelahkiri">
            <img src="{{ public_path('isi/assets/img/logo-f.png') }}" alt="logo" width="110px" srcset="">
        </div>
        <div class="col sebelahkanan" style="margin-top:-37px">
            <h1 class="font">INVOICE</h1>
            @foreach ($kode as $item)
            <p class="sub">IICO {{ $item->invoice_code }}</p>
            <br>
                 @php
                    $tanggal = date_create($item->invoice_date);
                    $hasiltanggal =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%b %d, %Y');

                    $tambahtanggal  = date('Y-m-d', strtotime($item->invoice_date . ' + 1 day'));
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
            <p class="bill" style="margin-top: -17px; color:black; line-height:19px">{{ $item->telepon_customer }}</p>
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
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    
                <tr>
                    <td style="text-align: left; padding-left:10px;">{{ $item->nama_barang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>$ {{ $item->harga_dollar }}</td>
                    <td>{{ $item->discount }} %</td>
                    <td>$ {{ $item->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container-grid">
        <div class="item-grid">
            <p class="block" style="margin-top:30px;">
                ADMIN FEE <span style="margin-left: 40px">${{ $item->charge }}</span>
            </p>
            
        </div>
        <div class="item-grid">
            @foreach ($kode as $item)
            <p class="block">
                GRAND TOTAL <span style="margin-left: 14px">${{ $item->total_finale }}</span>
            </p>
            @endforeach
        </div>
        <div class="item-grid">
            <p class="badge-red">
                DP MINIMAL  <span style="margin-left: 30px">${{ $dp }}</span>
            </p>
        </div>
    </div>
    <div class="row" style="height:auto; margin-top: 25px;">
        <p class="block2" >Harap cantumkan nomor Invoice berwarna biru
            <br> dalam berita transfer saat melakukan payment
        </p>
    </div>
    <div class="row" style="margin-top: -20px">
        <p class="badge-outline">Pengerjaan 8-15 hari kerja (bisa lebih lama jika orderan > 100 pcs)</p>
    </div>
    <footer>
        <p>iniitu • +62 89 628 781 916 • iniitumailnya@gmail.com • LINE @zye3506l </p>
    </footer>
</body>
</html>