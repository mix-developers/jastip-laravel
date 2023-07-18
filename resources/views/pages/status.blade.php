@extends('layouts.frontend.app')

@section('content')
    <div class="row ">
        @if ($order != null)
            @include('pages.component._tracking')
        @else
            @include('pages.component._not_found')
        @endif
    </div>
@endsection
