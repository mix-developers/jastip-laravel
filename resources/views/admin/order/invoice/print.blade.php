<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Invoice #{{ $order->resi }}</title>
</head>

<body>
    <table class="table table-borderles">
        <tr>
            <td>
                <img src="{{ public_path() }}/img/logo.png" alt="" width="100" />

            </td>
            <td>
                Jalan Raya Mandala Muli, Gang Mandau.<br>
                Belakang Rumah Makan Padang Pariaman<br>
                Kel. Mandala, Kec. Merauke<br>
                Kab. Merauke-Papua Selatan 99616<br>
                081344686261<br>
            </td>
            <td>
                tanggal : {{ $order->date }}<br>
                kepada Yth.<br>
                {{ $order->customer->name }}<br>
                {{ $order->customer->address }}<br>
                {{ $order->customer->phone }}<br>

            </td>
        </tr>
    </table>
    <div class="invoice-body">
        <!-- Row start -->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Layanan</th>
                        <th>Resi</th>
                        <th>Berat</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $order->description == null ? 'Paket' : $order->description }}

                        </td>
                        <td>{{ $order->resi }}</td>
                        <td>{{ $order->wight_item }} gram</td>
                        <td>Rp {{ number_format($order->price) }}</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2">
                            <p>
                                Subtotal<br>
                            </p>
                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                        </td>
                        <td>
                            <p>
                                Rp {{ number_format($order->price) }}
                            </p>
                            <h5 class="text-success"><strong>Rp {{ number_format($order->price) }}</strong></h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Row end -->
    </div>
    <table class="table table-borderles">
        <tr>
            <td>Tanda Terima</td>
            <td></td>
            <td align="right" style="height: 100px">Hormat Kami</td>
        </tr>
    </table>
    <div class="text-center">
        ***Terimakasih atas kepercayaan anda menggunakan jasa kami***<br>
        {{ date('d-m-Y H:i:s') }}
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
