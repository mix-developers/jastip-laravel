<div class="col-12 mb-3">
    <div class="p-2 bg-white shadow-sm text-center">
        <h2 class="text-success">Harga Pengiriman</h2>
    </div>
</div>
<div class="col-12">
    <div class="row justify-content-center">
        @foreach ($package_price as $item)
            <div class="col-md-6">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="mb-3"> {{ $item->name }}</h2>

                    </div>
                    <div class="card-footer bg-info text-white text-center">
                        <h2>Rp {{ number_format($item->price) }} / Kg</h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
