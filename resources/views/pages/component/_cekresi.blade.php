<div class="col-12">
    <form action="{{ url('/search_resi') }}" method="POST">
        @csrf
        <div class="input-group mb-3 shadow-sm">
            <input type="text" class="form-control" placeholder="Masukkan Nomor Resi di Sini"
                aria-label="Recipient's username" aria-describedby="basic-addon2" name="resi">
            <div class="input-group-append">
                <button class="btn  btn-success" type="submit"><i data-feather="search"></i> Cek Resi</button>
            </div>
        </div>
    </form>
</div>
