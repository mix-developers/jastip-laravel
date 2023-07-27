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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $title }} </h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0 lara-dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Resi</th>
                                            <th>Tanggal Input</th>
                                            <th>Customer</th>
                                            <th>Harga</th>
                                            <th>Asal</th>
                                            <th>Tujuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td width="10">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->resi }}
                                                </td>
                                                <td>
                                                    {{ $item->date }}
                                                </td>
                                                <td>
                                                    {{ $item->customer->name }}
                                                    <br><small class="text-muted">{{ $item->customer->phone }}</small>
                                                </td>
                                                <td>
                                                    {{ $item->price }}
                                                </td>
                                                <td>
                                                    {{ $item->from_subdivision->name }}
                                                </td>
                                                <td>
                                                    {{ $item->to_subdivision->name }}
                                                </td>
                                                <td width="200">
                                                    <a href="{{ url('/admin/order/printInvoice', $item->id) }}"
                                                        class="btn btn-light-primary btn-md"><i
                                                            class="icon feather icon-file f-16"></i>
                                                    </a>
                                                    <a href="https://api.whatsapp.com/send?phone={{ $item->customer->phone }}&text=Hai, *{{ $item->customer->name }}*, Paket anda telah siap..%0aTanggal input : {{ $item->date }}
                                                        %0aNo. Resi : {{ $item->resi }}%0aBerat Paket : {{ number_format($item->wight_item) }} gram%0aOngkir : Rp {{ number_format($item->price) }}%0aDikirim : Via {{ $item->transportation->type }}%0a%0aBisa di cek pada : {{ url('/status', $item->resi) }}%0a%0aHormat kami, Al Kafii Cargo"
                                                        target="_blank" class="btn btn-light-success btn-md"><i
                                                            class="fab fa-whatsapp f-16"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- subscribe end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
@endsection
@push('js')
    <!-- CKEditor -->
    <script src="{{ asset('backand_theme') }}/assets/plugins/ckeditor/ckeditor.js"></script>
@endpush
