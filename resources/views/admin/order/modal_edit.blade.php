<div class="modal fade edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('/admin/order/update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label>Upload foto paket</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="id_customer">Pelanggan</label>
                        <select name="id_customer" class=" form-control">
                            <option value="">--Pilih --</option>
                            @foreach (App\Models\Customer::all() as $customer)
                                <option value="{{ $customer->id }}" @if ($item->id_customer == $customer->id) selected @endif>
                                    {{ $customer->name }} - {{ $customer->phone }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_subdivision_from">Asal</label>
                                <select name="id_subdivision_from" class=" form-control">
                                    <option value="">--Pilih --</option>
                                    @foreach (App\Models\Subdivision::all() as $subdiv)
                                        <option value="{{ $subdiv->id }}"
                                            @if ($subdiv->id == $item->id_subdivision_from) selected @endif>{{ $subdiv->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_subdivision_to">Tujuan</label>
                                <select name="id_subdivision_to" class=" form-control">
                                    <option value="">--Pilih --</option>
                                    @foreach (App\Models\Subdivision::all() as $subdiv)
                                        <option value="{{ $subdiv->id }}"
                                            @if ($subdiv->id == $item->id_subdivision_to) selected @endif>{{ $subdiv->name }}
                                        </option>
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
                                    @foreach (App\Models\Transportation::all() as $trans)
                                        <option value="{{ $trans->id }}"
                                            @if ($trans->id == $item->id_transportation) selected @endif>{{ $trans->name }}
                                            ({{ $trans->type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date_estimate">Estimasi </label>
                                <input type="date" class="form-control @error('date_estimate') is-invalid @enderror"
                                    name="date_estimate" value="{{ $item->date_estimate }}">
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
                                    <input type="text" class="form-control myclass_edit{{ $item->id }}"
                                        placeholder="0" aria-describedby="berat_edit{{ $item->id }}"
                                        name="wight_item" id="berat_edit{{ $item->id }}"
                                        value="{{ $item->wight_item }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Paket Harga </label>
                                    <select name="" id="harga_edit{{ $item->id }}"
                                        class="form-control myclass_edit{{ $item->id }}">
                                        <option value="">--Pilih --</option>
                                        @foreach (App\Models\PackagePrice::all() as $pric)
                                            <option value="{{ $pric->price }}">{{ $pric->name }}
                                                ({{ $pric->price }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-danger">Rp <span id="result_edit{{ $item->id }}"></span></h2>
                    </div>
                    <label for="price">Harga Kirim </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" id="hasil_edit{{ $item->id }}" class="form-control" placeholder="0"
                            aria-describedby="hasil_edit{{ $item->id }}" name="price"
                            value="{{ $item->price }}">
                    </div>

                    <div class="form-group ">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ $item->description }}</textarea>
                    </div>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
