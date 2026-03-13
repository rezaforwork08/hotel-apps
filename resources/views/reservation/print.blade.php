<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Struk Reservasi</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            margin: 0;
            padding: 0;
            width: 80mm;
        }

        .receipt {

            width: 320px;
            /* untuk kertas 58mm, bisa diganti 320px untuk 80mm */
            margin: auto;
            padding: 10px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        table td {
            padding: 2px 0;
            vertical-align: top;
        }

        .right {
            text-align: right;
        }

        .barcode,
        .qrcode {
            text-align: center;
            margin: 10px 0;
        }

        @media print {
            body {
                margin: 0;
                /* width: 80mm; */
                widows: 320px;
            }

            .receipt {
                width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="receipt">
        <div class="center bold">
            <h3>HOTEL BINTANG 5</h3>
            <small>Jl. Contoh No.123, Jakarta</small><br>
            <small>Telp: (021) 123456</small>
        </div>

        <div class="line"></div>

        <table>
            <tr>
                <td>No. Reservasi</td>
                <td class="right">{{ $reservation->reservation_number }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td class="right">{{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</td>
            </tr>
            <tr>
                <td>Nama Tamu</td>
                <td class="right">{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
            </tr>
            <tr>
                <td>Kamar</td>
                <td class="right">{{ $reservation->room->name }} {{ $reservation->room->room_number }}</td>
            </tr>
            <tr>
                <td>Check-in</td>
                <td class="right">{{ $reservation->guest_check_in }}</td>
            </tr>
            <tr>
                <td>Check-out</td>
                <td class="right">{{ $reservation->guest_check_out }}</td>
            </tr>
        </table>

        <div class="line"></div>

        <table>
            <tr>
                <td>Subtotal</td>
                <td class="right">Rp {{ number_format($reservation->subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr class="bold">
                <td>Total</td>
                <td class="right">Rp {{ number_format($reservation->totalAmount, 0, ',', '.') }}</td>
            </tr>
        </table>

        <div class="line"></div>

        {{-- <div class="barcode">
            {!! DNS1D::getBarcodeHTML($reservation->reservation_number, 'C39', 1.5, 40) !!}
            <br><small>{{ $reservation->reservation_number }}</small>
        </div>

        <div class="qrcode">
            {!! QrCode::size(120)->generate(url('/reservation/detail/' . $reservation->reservation_number)) !!}
        </div> --}}

        <div class="center">
            <p>Terima kasih atas reservasi Anda</p>
            <p>~ Selamat Menginap ~</p>
        </div>
    </div>
</body>

</html>
