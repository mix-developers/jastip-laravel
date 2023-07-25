@extends('layouts.backend.admin')

@section('content')
    <section class="pc-container">

        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('layouts.backend.title')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- subscribe start -->

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Resi</td>
                                    <td class="text-center">
                                        {!! QrCode::size(150)->generate($order->resi) !!}<br>
                                        <strong>{{ $order->resi }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>
                                        <strong>{{ $order->customer->name }}</strong>
                                        <p class="text-muted">{{ $order->customer->phone }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td>
                                        <strong>{{ $order->date }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Estimasi</td>
                                    <td>
                                        <strong>{{ $order->date_estimate }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Kirim</td>
                                    <td>
                                        <strong>Rp {{ number_format($order->price) }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Berat Pekt</td>
                                    <td>
                                        <strong>{{ $order->wight_item }} gram</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>
                                        <strong>{{ $order->description }}</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Tracking Paket
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6 text-right">

                                    <button type="button" class="btn btn-success btn-md mb-3 btn-round" data-toggle="modal"
                                        data-target=".status"><i class="feather f-16 icon-plus"></i>
                                        Tambah status</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0 lara-dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Petugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_status as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ $item->thumbnail == '' ? asset('img/no-image.jpg') : url(Storage::url($item->thumbnail)) }}"
                                                        alt="{{ $item->status->status }}" class="img-fluid img-avatar"
                                                        width="50"></td>
                                                <td>
                                                    {{ $item->status->status }}<br>
                                                    <small class="text-muted">{{ $item->date }}</small>
                                                </td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>
                                                    <form method="POST"
                                                        action="{{ url('/admin/order/destroyStatus', $item->id) }}"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-light-danger btn-md delete-button"><i
                                                                class="feather icon-trash-2  f-16 "></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.order.modal_status')
@endsection
