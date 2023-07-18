<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip</title>

    <style>
        @page {
            margin: 5px;
            /* size: 165pt 100vh; */
        }

        body {
            margin: 5px 5px 0px 5px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        h5,
        p {
            margin: 2px 0;
        }

        p {
            font-size: 8px;
        }

        .container {
            width: 170px;
        }

        table {
            font-size: 8px;
        }

        thead,
        tbody {
            border-bottom: .5px solid #000;
            margin-bottom: 10px;
        }

        td {
            padding-bottom: 5px;
            padding-right: 5px;
        }

        thead,
        tfoot {
            font-weight: bold;
            font-size: 8px;
        }

        header {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            font-size: 10px;
        }

        table {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #999;
            padding: 4px 10px;
        }
    </style>
</head>

<body>

    <center><img src="{{ public_path() }}/img/logo.png" alt="" width="100" style="text-align:center;" /></center>

    <table class="table table-bordered table-hover" id="table-order">

        <thead>
            <tr>
                <th colspan='2' style="text-align:center;">Invoice</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Resi</td>
                <td align="center"><img src="data:image/png;base64, {!! $qr !!}">
                    <br>
                    {{ $order->resi }}
                </td>
            </tr>
            <tr>
                <td>Customer</td>
                <td><strong>{{ $order->customer->name }}</strong><br />{{ $order->customer->phone }}</td>
            </tr>
            <tr>
                <td>Tanggal Timbang</td>
                <td>{{ $order->date }}</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>{{ $order->to_subdivision->name }}</td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><strong>Rp {{ number_format($order->price, 0) }}</strong></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>{{ $order->description }}</td>
            </tr>"
        </tbody>
    </table>

</body>

</html>
