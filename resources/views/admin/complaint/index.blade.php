@extends('admin.template.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Aduan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Aduan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <p><b>id</b></p>
                <p>{{ $complaint->public_id }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Jenis</b></p>
                <p>{{ $complaint->type }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Nama</b></p>
                <p>{{ $complaint->name }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Lokasi</b></p>
                <p>{{ $complaint->location }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Tanggal</b></p>
                <p>{{ $complaint->date }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Waktu</b></p>
                <p>{{ $complaint->time }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Uraian</b></p>
                <p>{{ $complaint->description }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>File</b></p>
                <p><a href="/download/{{ $complaint->id }}"><button>Download</button></a></p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Nama Pelapor</b></p>
                <p>{{ $complaint->reporter_name }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>No HP Pelapor</b></p>
                <p>{{ $complaint->reporter_phone_number }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Status</b></p>
                <p>{{ __('complaint_status.'.$complaint->status) }}</p>
            </div>
        </div>
        <!-- /.Left col -->

        <div class="col-12 d-flex justify-content-center">
            @if ($complaint->status == 'submitted')
                <a href="/api/complaint/change_to_followed/{{ $complaint->id }}" target="_self"><button class="btn btn-primary">Tandai sebagai 'Ditindaklanjuti'</button></a>
            @elseif($complaint->status == 'followed_up')
                <a href="/api/complaint/change_to_finish/{{ $complaint->id }}" target="_self"><button class="btn btn-primary">Tandai sebagai 'Selesai'</button></a>
            @endif
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
