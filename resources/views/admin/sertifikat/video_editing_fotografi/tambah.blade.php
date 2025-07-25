@extends('layout.admin')
@section('title', 'Tambah Sertifikat Video Editing & Fotografi')
@push('css')
    <style>
        /* CSS untuk background gambar */
        .background-custom {
            background-image: url("{{ asset('asset/img/sertifikat.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 210mm;
            width: 297mm;
            /* Atur tinggi sesuai kebutuhan */
        }

        .nomor_serti {
            font-weight: bold;
            font-family: Arial;
            font-size: 16px;
        }

        .diberikan {
            font-family: 'Times New Roman', Times, serif;
            font-size: 21px;
            font-weight: bold;
        }

        .sertifikat tr td {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 16px;
        }

        .telah {
            /* font-family: 'Monotype Corsiva'; */
            font-family: 'Times New Roman', Times, serif;
            line-height: 3px;
            /* font-style: italic; */
        }

        input[type="date"] {
            line-height: normal;
        }

        .tanda_tangan {
            margin-top: -10px;
            margin-bottom: 5px;
            width: 15mm;
            height: 15mm;
        }

        .nama_direk {
            font-family: 'Times New Roman';
        }

        .direk {
            font-size: 10px;
            margin-top: -15px;
        }

        .foto {
            width: 3cm;
            height: 4cm;
            border: 1px solid black;
        }

        .background-custom-2 {
            /* background-image: url("/sertifikat.jpg"); */
            background-color: grey;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 210mm;
            width: 297mm;
            /* Atur tinggi sesuai kebutuhan */
        }

        .judul {
            font-size: 40px;
            font-weight: bolder;
            font-family: "Times New Roman", Times, serif;
            margin: 0px;
        }

        .keterangan,
        .signature {
            padding: 20px !important;
        }

        .table-container {
            width: 800px !important;
        }

        .table-nama {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 20px !important;
            width: 400px !important;
        }

        .table-nama tr td {
            padding: 5px !important;
        }

        .table-nama .table-nama-class {
            width: 35% !important;
        }

        .table-nama .table-nama-char {
            width: 5% !important;
            text-align: center !important;
        }

        .table-nama .table-nama-value {
            width: 60% !important;
        }

        .table-nilai {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 18px !important;
            width: 800px !important;
        }

        .table-nilai tr td {
            border: 1px black solid !important;
            padding: 5px !important;
            text-align: center !important;
        }

        .custom-height {
            height: 80px !important;
        }

        .mapel {
            text-align: left !important;
            padding-left: 20px !important;
        }

        .tabel-keterangan {
            font-family: "Times New Roman", Times, serif !important;

        }

        .tabel-keterangan tr td {
            padding: 5px !important;
            border: 0px !important;
        }

        .tanda-tangan {
            font-family: "Times New Roman", Times, serif !important;
        }


        /* Aturan print untuk menjaga background muncul saat dicetak */
        @media print {
            .background-custom {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
@endpush
@section('content')
    <form action="{{ url('/tambah-sertifikat/video-editing-fotografi') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger mx-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid background-custom d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12 my-0">
                    <center>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <p class="mt-1 nomor_serti">No : <input type="text" name="no_sertifikat" id=""
                                style="width: 250px !important;" value="{{ old('no_sertifikat') }}"></p>
                        <p class="my-3 diberikan">Diberikan Kepada :</p>
                        <p>
                        <table class="sertifikat">
                            <tr>
                                <td>Nama</td>
                                <td> &nbsp;:&nbsp; </td>
                                <td><input type="text" name="nama" id="" value="{{ $data->nama }}" readonly
                                        style="width: 300px !important;"></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td> &nbsp;:&nbsp; </td>
                                <td><input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}" readonly>,
                                    <input type="date" name="tanggal_lahir"
                                        value="{{ $data->tanggal_lahir->format('Y-m-d') }}" style="width: 135px !important;"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Induk Siswa</td>
                                <td> &nbsp;:&nbsp; </td>
                                <td><input type="text" name="nis" id="" style="width: 150px !important;"
                                        value="{{ old('nis') }}">
                                </td>
                            </tr>
                        </table>
                        </p>
                        <div class="telah">
                            <p>Telah Menyelesaikan Pendidikan Video Editing & Fotografi Program <input type="text"
                                    name="program" id=""style="width: 300px !important;"
                                    value="{{ old('program') }}"> yang
                                diselenggarakan oleh </p>
                            <p>LKP ELMUNA dari tanggal
                                @if ($data->tgl_mulai == !null)
                                    <input type="date" name="tgl_mulai" id=""
                                        value="{{ $data->tgl_mulai->format('Y-m-d') }}" style="width: 135px !important;"
                                        readonly>
                                @else
                                    <input type="date" name="tgl_mulai" id="" style=""
                                        value="{{ old('tgl_mulai') }}">
                                @endif
                                sampai
                                @if ($data->tgl_selesai == !null)
                                    <input type="date" name="tgl_selesai" id=""
                                        value="{{ $data->tgl_selesai->format('Y-m-d') }}" style="width: 135px !important;"
                                        readonly>
                                @else
                                    <input type="date" name="tgl_selesai" id=""
                                        value="{{ old('tgl_selesai') }}">
                                @endif
                            </p>
                            <p>dan dinyatakan : LULUS</p>
                        </div>
                    </center>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-2 foto"></div>
                <div class="col-md-4 mb-5 mbuh">
                    <center>
                        <p>Kebumen, {{ now()->isoFormat('DD MMMM Y') }} <br>
                            LKP ELMUNA</p>
                        <img src="{{ asset('asset/img/qr.png') }}" alt="" width="15%" class="tanda_tangan">
                        <p class="nama_direk"><b><u>MUHDORI, A. Md. T., S. Tr. Kom</u></b></p>
                        <p class="direk">DIREKTUR</p>
                    </center>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid background-custom-2 d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12 my-0">
                    <center>
                        <br /><br />
                        <p class="judul">Daftar Nilai Ujian</p>
                    </center>
                    <table class="layout">
                        <tr>
                            <td colspan="2">
                                <center>
                                    <table class="table-nama">
                                        <tr>
                                            <td class="table-nama-class">Nama</td>
                                            <td class="table-nama-char">:</td>
                                            <td class="table-nama-value"><input type="text" name="nama" id=""
                                                    value="{{ $data->nama }}" readonly style="width: 300px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Induk</td>
                                            <td>:</td>
                                            <td>Otomatis Terisi
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <center>
                                    <div class="table-container">
                                        <table class="table-nilai">
                                            <tr>
                                                <td class="custom-height custom-width-1">No.</td>
                                                <td class="custom-width-2">
                                                    MATA PELAJARAN
                                                </td>
                                                <td class="custom-width-3">NILAI</td>
                                                <td class="custom-width-4">KETERANGAN</td>
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td class="mapel"><input type="text" name="mapel1" id=""
                                                        value="{{ old('mapel1') }}"></td>
                                                <td><input type="text" name="nilai1" id=""
                                                        value="{{ old('nilai1') }}"></td>
                                                <td>Keterangan akan otomatis terisi</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td class="mapel"><input type="text" name="mapel2" id=""
                                                        value="{{ old('mapel2') }}"></td>
                                                <td><input type="text" name="nilai2" id=""
                                                        value="{{ old('nilai2') }}"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td class="mapel"><input type="text" name="mapel3" id=""
                                                        value="{{ old('mapel3') }}"></td>
                                                <td><input type="text" name="nilai3" id=""
                                                        value="{{ old('nilai3') }}"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td class="mapel"><input type="text" name="mapel4" id=""
                                                        value="{{ old('mapel4') }}"></td>
                                                <td><input type="text" name="nilai4" id=""
                                                        value="{{ old('nilai4') }}"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td class="mapel"><input type="text" name="mapel5" id=""
                                                        value="{{ old('mapel5') }}"></td>
                                                <td><input type="text" name="nilai5" id=""
                                                        value="{{ old('nilai5') }}"></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </center>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 50%" class="keterangan">
                                <table class="tabel-keterangan">
                                    <tr>
                                        <td colspan="4">Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>A</td>
                                        <td>86 - 100</td>
                                        <td>=</td>
                                        <td>Memuaskan</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>75 - 85</td>
                                        <td>=</td>
                                        <td>Baik</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>65 - 74</td>
                                        <td>=</td>
                                        <td>Cukup</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td>55 - 64</td>
                                        <td>=</td>
                                        <td>Kurang</td>
                                    </tr>
                                    <tr>
                                        <td>E</td>
                                        <td>0 - 54</td>
                                        <td>=</td>
                                        <td>Tidak Lulus</td>
                                    </tr>
                                </table>
                            </td>

                            <td class="signature" style="width: 50%">
                                <div class="tanda-tangan">
                                    <center>
                                        <p>
                                            Kebumen, {{ now()->isoFormat('DD MMMM Y') }} <br />
                                            Bagian Akademik
                                        </p>
                                        <img src="{{ asset('/asset/img/tanda_tangan-2.png') }}" alt=""
                                            width="50%">
                                        <p>SITI SUGIHATI</p>
                                    </center>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="my-2">
            <center>
                <a href="{{ url('/sertifikat/video-editing-fotografi') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Kirim</button>
            </center>
        </div>
    </form>

@endsection
