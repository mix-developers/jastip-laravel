@extends('layouts.frontend.app')

@section('content')
    <div class="row ">
        @include('pages.component._carousel')
        @include('pages.component._cekresi')
        @include('pages.component._subdivisions')
        @include('pages.component._price_list')
    </div>
@endsection
