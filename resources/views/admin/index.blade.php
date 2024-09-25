@extends('admin.template.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Daftar Aduan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Nama pelapor</th>
                    <th scope="col">No HP pelapor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($complaints as $complaint)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $complaint->type }}</td>
                        <td>{{ $complaint->name }}</td>
                        <td>{{ $complaint->location }}</td>
                        <td>{{ $complaint->date }}</td>
                        <td>{{ $complaint->time }}</td>
                        <td>{{ $complaint->reporter_name }}</td>
                        <td>{{ $complaint->reporter_phone_number }}</td>
                        <td>{{ __('complaint_status.'.$complaint->status) }}</td>
                        <td>
                            <a href="/admin/complaint/{{ $complaint->id }}"><button class="btn btn-primary">Detail</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection
