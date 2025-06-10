<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/asset/img/icon1.png') }}" type="image/x-icon">
    <title>Elmuna | Cetak Sertifikat Mengemudi</title>
    <link rel="stylesheet" href="{{ url('/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" />
    <style>
        /* CSS untuk background gambar */
        .background-custom {
            /* background-image: url("{{ asset('asset/img/sertifikat.jpg') }}"); */
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
            font-family: 'Arial';
            font-size: 21px;
            font-weight: bold;
        }

        .sertifikat tr td {
            font-family: Arial;
            font-weight: bold;
            font-size: 16px;
        }

        .telah {
            /* font-family: 'Monotype Corsiva'; */
            font-family: 'Arial';
            line-height: 3px;
            /* font-style: italic; */
        }

        .mbuh {
            font-family: Arial;
            font-size: 16px;
        }

        .mbuh p {
            margin-bottom: 0;
        }

        .tanda_tangan {
            margin-top: 3px;
            margin-bottom: 5px;
            width: 15mm;
            height: 15mm;
        }

        .nama_direk {
            font-family: 'Times New Roman';
        }

        .direk {
            font-size: 10px;
            margin-top: -5px;
        }

        .foto {
            width: 3cm;
            height: 4cm;
            border: 1px solid black;
        }



        /* Aturan print untuk menjaga background muncul saat dicetak */
        @media print {
            .background-custom {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>

<body>
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
                    <p class="mt-1 nomor_serti">No : {{ $data->no_sertifikat }}</p>
                    <p class="my-3 diberikan">Diberikan Kepada :</p>
                    <p>
                    <table class="sertifikat">
                        <tr>
                            <td>Nama</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, tanggal lahir</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir->isoFormat('DD MMMM Y') }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->nis }}
                            </td>
                        </tr>
                    </table>
                    </p>
                    <div class="telah">
                        <p>Telah Menyelesaikan Pendidikan Mengemudi Program {{ $data->program }}</p>
                        <p>yang diselenggarakan oleh LKP ELMUNA dari tanggal
                            {{ $data->tgl_mulai->isoFormat('DD MMMM Y') }}
                            sampai
                            {{ $data->tgl_selesai->isoFormat('DD MMMM Y') }}
                        </p>
                        <p>dan dinyatakan : LULUS</p>
                    </div>
                </center>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2 foto"></div>
            <div class="col-md-4 mb-5 mbuh">
                <center>
                    <p>Kebumen, {{ now()->isoFormat('dddd, DD MMMM Y') }}</p>
                    <p>LKP ELMUNA</p>
                    <img src="{{ asset('asset/img/qr.png') }}" alt="" class="tanda_tangan">
                    <p class="nama_direk"><b><u>MUHDORI, A. Md. T., S. Tr. Kom</u></b></p>
                    <p class="direk">DIREKTUR</p>
                </center>
            </div>
        </div>
    </div>

    <script src="{{ url('/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        window.print();
    </script>
</body>

</html>
