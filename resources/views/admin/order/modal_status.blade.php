<div class="modal fade status" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Input Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('/admin/order/storeStatus') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_order" value="{{ $order->id }}">
                    <div class="form-group mb-3">
                        <label>Upload foto paket</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="id_status">Status</label>
                        <select name="id_status" class=" form-control">
                            <option value="">--Pilih --</option>
                            @foreach (App\Models\Status::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
