<div class="modal fade view-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Detail Cabang {{ $item->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">

                    <table class="table" style="width: 100%">
                        <tr>
                            <td>Nama Cabang</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <td>Manager Cabang</td>
                            <td>{{ $item->manager }}</td>
                        </tr>
                        <tr>
                            <td>Kontak Cabang</td>
                            <td>{{ $item->phone }}</td>
                        </tr>
                        <tr>
                            <td>Cara Pengiriman</td>
                            <td>{!! $item->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
