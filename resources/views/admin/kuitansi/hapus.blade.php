@extends('layout.admin')
@section('title', 'Hapus Kuitansi')
@push('css')
    <style>
        .form {
            font-family: "Times New Roman";
            margin: 0;
            padding: 0;
        }

        .garis {
            border-bottom: 2px solid black;
            border-top: 2px solid black;
        }

        .garis-bawah {
            border-bottom: 2px solid black;
        }

        .garis-strip {
            border-top: 1px dashed black;
        }
    </style>
@endpush
@section('content')
    <center>
        <h3>Hapus Data Kuitansi</h3>
        <h4>Apakah anda yakin ingin menghapus data dibawah ini?</h4>
        <div class="alert alert-danger col-6 col-md-6 col-sm-6" role="alert">
            <h4><i class='bx bx-error'></i> Data yang dihapus tidak dapat dikembalikan!</h4>
        </div>
    </center>
    <hr>
    <div class="form">
        <div class="row">
            <div class="col-10 garis">
                <center>
                    <font size="5"><b>B U K T I &nbsp; P E M B A Y A R A N</b></font>
                </center>
            </div>
            <div class="col-2 garis">
                <center>
                    <font size="3"><b>01</b></font>
                </center>
            </div>
            <div class="col-9">
                <div class="garis-bawah">
                    <center>
                        <font size="4"><b>LKP/LPK ELMUNA</b></font>
                        <br>
                        <font size="3">
                            <b> JL. SOKA PETANAHAN NO. 10 KM. 6 KEC. KLIRONG KAB. KEBUMEN </b>
                        </font>
                        <br>
                        <font size="3">
                            <b>NO HP/WA 082134389173, 085325636373</b>
                        </font>
                    </center>
                </div>
                <br>
                <table>
                    <tr>
                        <td>Nama &nbsp;</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td>Guna Membayar &nbsp;</td>
                        <td>:</td>
                        <td>{{ $data->guna_byr1 }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>{{ $data->guna_byr2 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $data->guna_byr3 }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Diterima &nbsp;</td>
                        <td>:</td>
                        <td> Rp. {{ $data->jumlah }} ,-</td>
                    </tr>
                    <tr>
                        <td>Terbilang &nbsp;</td>
                        <td>:</td>
                        <td>{{ $data->terbilang }}</td>
                    </tr>
                    <tr>
                        <td>Pembayaran &nbsp;</td>
                        <td>:</td>
                        <td>{{ $data->pembayaran }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-3">
                <table>
                    <tr>
                        <td>NO.KWT</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>XXXX-{{ now()->isoFormat('Y') }}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ now()->isoFormat('DD/MM/Y') }}</td>
                    </tr>
                    <tr>
                        <td>HARI</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ now()->isoFormat('dddd') }}</td>
                    </tr>
                    <tr>
                        <td>JAM</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ now()->isoFormat('H:mm') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-9">
                <font size="2">
                    <i><b>Catatan :</b></i>
                    <br>
                    <i>Biaya yang sudah dibayarkan tidak dapat diambil kembali</i>
                    <br>
                    <i>
                        Kuitansi ini diolah oleh komputer dan sah, apabila ada Nama, Cap,
                        dan
                    </i>
                    <br>
                    <i>Tanda tangan penerima</i>
                </font>
            </div>
            <div class="col-3">
                <center>
                    <font size="4"> PENERIMA </font>
                    <br>
                    <br>
                    <br>
                    <font size="">
                        {{ $data->penerima }}
                    </font>
                </center>
            </div>
        </div>
        <br>
        <div class="col-12">
            <center>
                <font size="3">
                    *** Terimakasih ***
                    <br>
                    Ket {{ $data->cara_bayar }}
                </font>
            </center>
        </div>
        <hr>
        <div class="my-2">
            <center>
                <form action="{{ url('/destroy-kuitansi/' . $data->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="{{ url('/kuitansi') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </center>
        </div>
    </div>
@endsection
