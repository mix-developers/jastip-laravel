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

                <form method="POST" action="{{ url('/admin/subdivision/update', $item->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Cabang</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Cabang</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{ $item->address }}">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone">Nomor HP Cabang</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $item->phone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="manager">Manager Cabang</label>
                            <input type="text" class="form-control @error('manager') is-invalid @enderror"
                                name="manager" value="{{ $item->manager }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label>Cara Pengiriman</label>
                        <textarea class="ckeditor" name="description" id="description" cols="30" rows="4">{!! $item->description !!}</textarea>
                    </div>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
