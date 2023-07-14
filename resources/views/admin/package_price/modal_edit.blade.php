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

                <form method="POST" action="{{ url('/admin/package_price/update', $item->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="prie">Harga (/kg)</label>
                        <input type="text" class="form-control @error('prie') is-invalid @enderror" name="prie"
                            value="{{ $item->price }}">
                    </div>
                    <div class="form-group">
                        <label for="id_subdivision">Cabang</label>
                        <select name="id_subdivision" id="id_subdivision" class="form-control">
                            <option value="">--Pilih Cabang --</option>
                            @foreach ($subdivision as $list)
                                <option value="{{ $list->id }}" @if ($item->id_subdivision == $list->id) selected @endif>
                                    {{ $list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="{{ asset('admin_theme') }}/assets/plugins/ckeditor/ckeditor.js"></script>
    <!-- CKEditor -->
    <script src="{{ asset('admin_theme') }}/assets/plugins/ckeditor/ckeditor.js"></script>
@endpush
