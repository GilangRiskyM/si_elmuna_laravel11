<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elmuna | Cetak Kuitansi</title>
    <link rel="icon" href="/asset/img/icon1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
        * {
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
            line-height: 1.2;
            margin-bottom: 10px;
        }


        .garis-strip {
            border-bottom: 2px dashed black;
        }
    </style>
</head>

<body class="my-3">
    <!-- Untuk Peserta -->
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
            <table>
                <tr>
                    <td>Nama &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Guna Membayar &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->guna_byr1 }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>&nbsp; {{ $data->guna_byr2 }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>&nbsp; {{ $data->guna_byr3 }}</td>
                </tr>
                <tr>
                    <td>Jumlah Diterima &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; Rp. {{ number_format($data->jumlah, 0, ',', '.') }} ,-</td>
                </tr>
                <tr>
                    <td>Pembayaran &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->pembayaran }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="col-3">
            <table>
                <tr>
                    <td>NO.KWT</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{ $data->id }}-{{ now()->isoFormat('Y') }}</td>
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
                    <td>{{ now()->isoFormat('HH:mm') }}</td>
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
                <font size=""> {{ $data->penerima }} </font>
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
    <br>
    <hr class="garis-strip">
    <br>
    <!-- Untuk Arsip -->
    <div class="row">
        <div class="col-10 garis">
            <center>
                <font size="5"><b>B U K T I &nbsp; P E M B A Y A R A N</b></font>
            </center>
        </div>
        <div class="col-2 garis">
            <center>
                <font size="3"><b>02</b></font>
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
            <table>
                <tr>
                    <td>Nama &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Guna Membayar &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->guna_byr1 }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>&nbsp; {{ $data->guna_byr2 }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>&nbsp; {{ $data->guna_byr3 }}</td>
                </tr>
                <tr>
                    <td>Jumlah Diterima &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; Rp. {{ number_format($data->jumlah, 0, ',', '.') }} ,-</td>
                </tr>
                <tr>
                    <td>Pembayaran &nbsp;</td>
                    <td>:</td>
                    <td>&nbsp; {{ $data->pembayaran }}</td>
                </tr>
            </table>
        </div>
        <div class="col-3">
            <table>
                <tr>
                    <td>NO.KWT</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{ $data->id }}-{{ now()->isoFormat('Y') }}</td>
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
                    <td>{{ now()->isoFormat('HH:mm') }}</td>
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
                <font size=""> {{ $data->penerima }} </font>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        window.print();
    </script>
</body>

</html>
