@extends('template.app', ['title' => 'Sistem pengaduan pelanggaran TGR'])

@push('add-on-style')
    <style>
        #imgPoster {
            width: 100%;
        }

        #imgFlowchart {
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center mb-3 mt-3">
            <button class="btn btn-primary" data-target="#createComplaint" data-toggle="modal">
                Buat aduan <br>
                Klik disini untuk buat aduan pelanggaran
            </button>
        </div>

        <div class="col-12 d-flex justify-content-center mb-5">
            <button class="btn btn-success" data-target="#trackComplaint" data-toggle="modal">
                Lacak progres aduan <br>
                Klik disini untuk melacak aduan pelanggaran anda
            </button>
        </div>

        <div class="col-12 d-flex justify-content-center mb-5">
            <img src="/image/poster_2.jpg" id="imgPoster">
        </div>

        <div class="col-12">
            <h3 class="text-center">Tentang whistleblowing sistem (aduan nasabah)</h3>
            <p class="text-justify">Whistleblowing System (WBS) berfungsi untuk melaporkan atau menginformasikan suatu perbuatan yang terindikasi pelanggaran di lingkungan PT BPR BANK TGR (PERSERODA).</p>
            <p class="text-justify">WBS adalah mekanisme penyampaian pengaduan dugaan tindak pidana tertentu yang telah terjadi atau akan terjadi yang melibatkan pegawai dan orang lain yang yang dilakukan dalam organisasi tempatnya bekerja, dimana pelapor bukan merupakan bagian dari pelaku kejahatan yang dilaporkannya.</p>
        </div>

        <div class="col-12">
            <h3>Unsur pengaduan</h3>
            <ul>
                <li>WHAT yaitu apa perbuatan berindikasi Tindak Pidana Korupsi/pelanggaran yang diketahui.</li>
                <li>WHO yaitu siapa yang bertanggungjawab/terlibat dan terkait dalam perbuatan tersebut.</li>
                <li>WHERE yaitu dimana tempat terjadinya perbuatan tersebut dilakukan.</li>
                <li>WHEN yaitu kapan waktu perbuatan tersebut dilakukan.</li>
                <li>HOW yaitu Bagaimana cara perbuatan tersebut dilakukan (modus, cara, dan sebagainya).</li>
                <li>EVIDENCE (jika ada) yaitu Dilengkapi dengan bukti permulaan (data, dokumen, gambar dan rekaman) yang mendukung.</li>
            </ul>
        </div>

        <div class="col-12">
            <h3>Komitmen dan Jaminan Kerahasiaan</h3>
            <p>Anda tidak perlu khawatir terungkapnya identitas diri anda karena kami akan MERAHASIAKAN & MELINDUNGI Identitas Anda sebagai whistleblower. PT BPR BANK TGR (PERSERODA) sangat menghargai informasi yang Anda laporkan. Fokus kami kepada materi informasi yang Anda Laporkan. Sebagai bentuk terimakasih kami terhadap laporan yang Anda kirim, kami berkomitmen untuk merespon laporan Anda sesegera mungkin.</p>
        </div>

        <div class="col-12 d-flex justify-content-center mb-5">
            <img src="/image/flowchart_whistleblowing.png" id="imgFlowchart">
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="createComplaint">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat aduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/api/complaint" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="inputType">Jenis Aduan<span class="text-danger">*</span></label>
                            <select class="form-control" name="type" id="inputType" required>
                                <option>Gratifikasi</option>
                                <option>Penyimpangan Tugas dan Fungsi</option>
                                <option>Benturan Kepentingan</option>
                                <option>Melanggar Peraturan / Hukum</option>
                                <option>Tindak Pidana Korupsi</option>
                                <option>Tindak Pidana Pencucian Uang</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Nama Terlapor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputName" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="inputLocation">Lokasi Kejadian<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputLocation" name="location" required>
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Tanggal Kejadian<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="inputDate" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="inputTime">Waktu Kejadian<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="inputTime" name="time" required>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Uraian Pengaduan<span class="text-danger">*</span></label>
                            <textarea rows="2" class="form-control" name="description" id="inputDescription" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Lampiran / Bukti pengaduan</label>
                            <input type="file" class="form-control-file" id="inputFile" name="file">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama pelapor</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="reporter_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nomor HP pelapor</label>
                            <input type="tel" class="form-control" id="exampleInputPassword1" name="reporter_phone_number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="trackComplaint">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lacak aduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/track/" id="trackingForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputId">ID Laporan</label>
                            <input type="text" class="form-control" id="inputId" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lacak</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('add-on-script')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });

        const trackingForm = document.getElementById('trackingForm');
        trackingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const inputId = document.getElementById('inputId').value;
            window.location.href = `/track/${inputId}`;
        });
    </script>
@endpush
