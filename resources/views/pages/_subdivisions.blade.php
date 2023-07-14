<div class="col-12">
    <div class="row justify-content-center">
        @foreach ($subdivision as $item)
            <div class="col-md-6">
                <div class="card support-bar">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $item->name }}</h2>
                        <span class="text-info"><i class="fa fa-phone"></i> {{ $item->phone }}</span>
                        <p class="mb-3 mt-3">Alamat : {{ $item->address }}</p>
                        <p class="text-muted">Deskripsi : {!! $item->description !!}</p>
                    </div>
                    <div class="card-footer bg-info text-white">
                        <div class="row text-center">
                            <div class="col border-right">
                                <h4 class="m-0 text-white">10</h4>
                                <span>Udara</span>
                            </div>
                            <div class="col ">
                                <h4 class="m-0 text-white">5</h4>
                                <span>Laut</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
