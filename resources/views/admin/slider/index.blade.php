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
                            <h5>Tambah pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/admin/slider/store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Thumbnail </label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        name="thumbnail">
                                </div>
                                <div class="form-group">
                                    <label for="name">Judul</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description">
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
                                            <th>Thumbnail</th>
                                            <th>Judul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slider as $item)
                                            <tr>
                                                <td width="10">{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $item->thumbnail == '' ? asset('img/no-image.jpg') : url(Storage::url($item->thumbnail)) }}"
                                                        alt="{{ $item->name }}" class="img-fluid img-avatar"
                                                        width="150">
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                    <br><small class="text-muted">Keterangan
                                                        : {{ Str::limit($item->description, 100) }}</small>
                                                </td>
                                                <td width="200">
                                                    <button type="button" class="btn btn-light-warning btn-md"
                                                        data-toggle="modal" data-target=".edit-{{ $item->id }}"><i
                                                            class="icon feather icon-edit f-16"></i>
                                                        Edit</button>
                                                    @include('admin.slider.modal_edit')
                                                    <form method="POST"
                                                        action="{{ url('/admin/slider/destroy', $item->id) }}"
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
