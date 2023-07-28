@extends('layouts.backend.admin')

@section('content')
    <section class="pc-container">

        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('layouts.backend.title')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                @if ($errors->any())
                    <div class="col-12">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- subscribe start -->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $title }} </h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6 text-right">

                                    <button type="button" class="btn btn-success btn-md mb-3 btn-round" data-toggle="modal"
                                        data-target=".tambah"><i class="feather f-16 icon-plus"></i>
                                        Tambah</button>
                                </div>
                            </div>
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
                                                    <a href="{{ url('/admin/order/print', $item->id) }}"
                                                        class="btn btn-light-primary btn-md"><i
                                                            class="icon feather icon-printer f-16"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/order', $item->resi) }}"
                                                        class="btn btn-light-success btn-md"><i
                                                            class="icon feather icon-eye f-16"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-light-warning btn-md"
                                                        data-toggle="modal" data-target=".edit-{{ $item->id }}"><i
                                                            class="icon feather icon-edit f-16"></i>
                                                    </button>
                                                    @include('admin.order.modal_edit')
                                                    {{-- @include('admin.order.modal_view') --}}
                                                    <form method="POST"
                                                        action="{{ url('/admin/order/destroy', $item->id) }}"
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
                <!-- subscribe end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
    @include('admin.order.modal_create')
@endsection
@push('js')
    <!-- CKEditor -->
    <script src="{{ asset('backand_theme') }}/assets/plugins/ckeditor/ckeditor.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script>
        var sum = 0;

        $(".myclass").on("change", function() {
            var value1 = document.getElementById('harga').value;
            var value2 = document.getElementById('berat').value;
            var sum = parseInt(value1) * (parseInt(value2) / 1000);
            document.getElementById('result').innerHTML = sum;
            document.getElementById('hasil').value = sum;
        });
    </script>
    @foreach ($order as $item)
        <script>
            var sum_edit{{ $item->id }} = {{ $item->price }};
            $(".myclass_edit{{ $item->id }}").on("change", function() {
                var value1_edit{{ $item->id }} = document.getElementById('harga_edit{{ $item->id }}').value;
                var value2_edit{{ $item->id }} = document.getElementById('berat_edit{{ $item->id }}').value;
                var sum_edit{{ $item->id }} = parseInt(value1_edit{{ $item->id }}) * (parseInt(
                    value2_edit{{ $item->id }}) / 1000);
                document.getElementById('result_edit{{ $item->id }}').innerHTML = sum_edit{{ $item->id }};
                document.getElementById('hasil_edit{{ $item->id }}').value = sum_edit{{ $item->id }};
            });
        </script>
    @endforeach
@endpush
