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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Paket Harg</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/admin/package_price/store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Paket</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                </div>
                                <label for="price">Harga (/kg)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append" name="price">
                                        <span class="input-group-text" id="basic-addon2">Rp</span>
                                    </div>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Harga" aria-label="harga" name="price"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append" name="price">
                                        <span class="input-group-text" id="basic-addon2">/kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_subdivision">Cabang</label>
                                    <select name="id_subdivision" id="id_subdivision" class="form-control">
                                        <option value="">--Pilih Cabang --</option>
                                        @foreach ($subdivision as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn  btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
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
                                            <th>Nama Paket</th>
                                            <th>Harga</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_price as $item)
                                            <tr>
                                                <td width="10">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    Rp {{ number_format($item->price) }} /Kg
                                                </td>
                                                <td>
                                                    {{ $item->subdivision->name }}
                                                </td>
                                                <td width="200">
                                                    <button type="button" class="btn btn-light-warning btn-md"
                                                        data-toggle="modal" data-target=".edit-{{ $item->id }}"><i
                                                            class="icon feather icon-edit f-16"></i>
                                                        Edit</button>
                                                    @include('admin.package_price.modal_edit')
                                                    <form method="POST"
                                                        action="{{ url('/admin/package_price/destroy', $item->id) }}"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-light-danger btn-md delete-button"><i
                                                                class="feather icon-trash-2  f-16 "></i> Delete
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
@endsection
