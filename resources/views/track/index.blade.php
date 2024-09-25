@extends('template.app', ['title' => 'Tracking pengaduan'])

@section('content')
    <div class="row">
        <div class="col-12 mt-3 mb-3">
            <div class="info-box bg-gradient-danger">

                <div class="info-box-content">
                    <span class="info-box-text text-center" style="font-size: 1.5em;">{{ $complaint->public_id }}</span>
                    <span class="info-box-number text-center" style="font-size: 1.5em;">ID Aduan Anda</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between">
                <p><b>Jenis Aduan</b></p>
                <p>{{ $complaint->type }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Nama Terlapor</b></p>
                <p>{{ $complaint->name }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Lokasi Kejadian</b></p>
                <p>{{ $complaint->location }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Tanggal Kejadian</b></p>
                <p>{{ $complaint->date }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Waktu Kejadian</b></p>
                <p>{{ $complaint->time }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Uraian Pengaduan</b></p>
                <p>{{ $complaint->description }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Lampiran/Bukti pengaduan</b></p>
                <p><a href="/download/{{ $complaint->id }}"><button>Download</button></a></p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>Nama pelapor</b></p>
                <p>{{ $complaint->reporter_name }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <p><b>No HP pelapor</b></p>
                <p>{{ $complaint->reporter_phone_number }}</p>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="info-box bg-gradient-info">

                <div class="info-box-content">
                    <span class="info-box-text text-center" style="font-size: 1.5em;">{{ __('complaint_status.'.$complaint->status) }}</span>
                    <span class="info-box-number text-center" style="font-size: 1.5em;">Status terakhir aduan</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 mb-3">
            <h4 class="text-center">Progress Aduan</h4>

            @foreach($logs as $log)
                @if ($log->type == 'Created at')
                    <div class="callout callout-info">
                        <h5>{{ __('complaint_logs.created_at') }} {{ $log->data }}</h5>
                    </div>
                @elseif($log->type == 'Followed up')
                    <div class="callout callout-info">
                        <h5>{{ __('complaint_logs.followed_up_at') }} {{ $log->data }}</h5>
                    </div>
                @else
                    <div class="callout callout-info">
                        <h5>{{ __('complaint_logs.finished_at') }} {{ $log->data }}</h5>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
