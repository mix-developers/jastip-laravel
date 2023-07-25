<div class="col-12">
    <div class="card shadow-sm">

        <div class="card-body">
            <div id="carouselExampleIndicatorscaption" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($slider as $item)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $item->id }}"
                            class="{{ $slider->first()->id == $item->id ? 'active' : '' }}">
                        </li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($slider as $item)
                        <div class="carousel-item {{ $slider->first()->id == $item->id ? 'active' : '' }}"">
                            <img class="img-fluid d-block w-100"
                                src="{{ $item->thumbnail == '' ? asset('img/no-image.jpg') : url(Storage::url($item->thumbnail)) }}"
                                alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white">{{ $item->name }}</h5>
                                <p>{{ Str::limit($item->description, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorscaption" role="button"
                    data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span
                        class="sr-only">Previous</span></a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorscaption" role="button"
                    data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span
                        class="sr-only">Next</span></a>
            </div>
        </div>
    </div>
</div>
