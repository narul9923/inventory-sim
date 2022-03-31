@extends('layouts.app')

@section('content')
<div class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $barang_masuk }}</h3>
                        <p>Total Barang Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $barang_keluar }}</h3>
                        <p>Total Barang Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
