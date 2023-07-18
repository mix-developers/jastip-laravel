@extends('layouts.backend.admin')

@section('content')
    <section class="pc-container">

        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('layouts.backend.title')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-12 text-center "
                    style="margin: 0;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);">
                    <h1 class="text-danger">Resi tidak ditemukan</h1>
                    <a href="{{ url('/admin/update_status') }}" class="btn btn-primary">Cek ulang resi</a>
                </div>
            </div>
        </div>
    </section>
@endsection
