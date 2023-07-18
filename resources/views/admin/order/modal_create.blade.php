<div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Input Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('/admin/order/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Foto Paket</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_customer">Pelanggan</label>
                        <select name="id_customer" class=" form-control">
                            <option value="">--Pilih --</option>
                            @foreach (App\Models\Customer::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->phone }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_subdivision_from">Asal</label>
                                <select name="id_subdivision_from" class=" form-control">
                                    <option value="">--Pilih --</option>
                                    @foreach (App\Models\Subdivision::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_subdivision_to">Tujuan</label>
                                <select name="id_subdivision_to" class=" form-control">
                                    <option value="">--Pilih --</option>
                                    @foreach (App\Models\Subdivision::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_transportation">Transportasi</label>
                                <select name="id_transportation" class=" form-control">
                                    <option value="">--Pilih --</option>
                                    @foreach (App\Models\Transportation::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date_estimate">Estimasi </label>
                                <input type="date" class="form-control @error('date_estimate') is-invalid @enderror"
                                    name="date_estimate">
                            </div>
                        </div>
                    </div>
                    <div class="p-2 border border-secondary rounded my-3">
                        <label>Hitung Harga Paket</label>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <label for="wight_item">Berat Paket </label>
                                <div class="input-group">
                                    <input type="text" class="form-control myclass" placeholder="0"
                                        aria-describedby="berat" name="wight_item" id="berat" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Paket Harga </label>
                                    <select name="" id="harga" class="form-control myclass" required>
                                        <option value="">--Pilih --</option>
                                        @foreach (App\Models\PackagePrice::all() as $item)
                                            <option value="{{ $item->price }}">{{ $item->name }}
                                                ({{ $item->price }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-danger">Rp <span id="result"></span></h2>
                    </div>
                    <label for="price">Harga Kirim </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" id="hasil" class="form-control" placeholder="0"
                            aria-describedby="hasil" name="price">
                    </div>

                    <div class="form-group ">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
