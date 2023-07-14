@extends('layouts.frontend.app')

@section('content')
    <div class="row ">
        @include('pages._carousel')
        @include('pages._cekresi')
        <div class="col-12 mb-3">
            <div class="p-2 bg-white shadow-sm text-center">
                <h2 class="text-success">Alamat Pengiriman</h2>

            </div>
        </div>
        @include('pages._subdivisions')
    </div>
@endsection
