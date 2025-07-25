@extends('layout.admin')
@section('title', 'Data Sertifikat Video Editing & Fotografi')
@section('content')
    <center>
        <h1 class="my-3">Sertifikat Video Editing & Fotografi</h1>
    </center>
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="{{ url('/sertifikat/video-editing-fotografi') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="{{ url('/sertifikat/video-editing-fotografi') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>

    <div class="table-responsive table-data">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Sertifikat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>NIS</th>
                    <th>Program</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Mapel 1</th>
                    <th>Mapel 2</th>
                    <th>Mapel 3</th>
                    <th>Mapel 4</th>
                    <th>Mapel 5</th>
                    <th>Nilai 1</th>
                    <th>Nilai 2</th>
                    <th>Nilai 3</th>
                    <th>Nilai 4</th>
                    <th>Nilai 5</th>
                    <th>Keterangan 1</th>
                    <th>Keterangan 2</th>
                    <th>Keterangan 3</th>
                    <th>Keterangan 4</th>
                    <th>Keterangan 5</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>{{ $datum->no_sertifikat }}</td>
                            <td>{{ $datum->tempat_lahir }}</td>
                            <td>{{ $datum->tanggal_lahir->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $datum->nis }}</td>
                            <td>{{ $datum->program }}</td>

                            <td>
                                @if ($datum->tgl_mulai == !null)
                                    {{ $datum->tgl_mulai->isoFormat('D MMMM Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($datum->tgl_selesai == !null)
                                    {{ $datum->tgl_selesai->isoFormat('D MMMM Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $datum->mapel1 }}</td>
                            <td>{{ $datum->mapel2 }}</td>
                            <td>{{ $datum->mapel3 }}</td>
                            <td>{{ $datum->mapel4 }}</td>
                            <td>{{ $datum->mapel5 }}</td>
                            <td>{{ $datum->nilai1 }}</td>
                            <td>{{ $datum->nilai2 }}</td>
                            <td>{{ $datum->nilai3 }}</td>
                            <td>{{ $datum->nilai4 }}</td>
                            <td>{{ $datum->nilai5 }}</td>
                            <td>
                                @if ($datum->nilai1 == !null)
                                    @if ($datum->nilai1 >= 86)
                                        Memuaskan
                                    @elseif($datum->nilai1 >= 75 && $datum->nilai1 <= 85)
                                        Baik
                                    @elseif($datum->nilai1 >= 65 && $datum->nilai1 <= 74)
                                        Cukup
                                    @elseif($datum->nilai1 >= 55 && $datum->nilai1 <= 64)
                                        Kurang
                                    @else
                                        Tidak Lulus
                                    @endif
                                @else
                                    &nbsp;
                                @endif
                            </td>
                            <td>
                                @if ($datum->nilai2 == !null)
                                    @if ($datum->nilai2 >= 86)
                                        Memuaskan
                                    @elseif($datum->nilai2 >= 75 && $datum->nilai2 <= 85)
                                        Baik
                                    @elseif($datum->nilai2 >= 65 && $datum->nilai2 <= 74)
                                        Cukup
                                    @elseif($datum->nilai2 >= 55 && $datum->nilai2 <= 64)
                                        Kurang
                                    @else
                                        Tidak Lulus
                                    @endif
                                @else
                                    &nbsp;
                                @endif
                            </td>
                            <td>
                                @if ($datum->nilai3 == !null)
                                    @if ($datum->nilai3 >= 86)
                                        Memuaskan
                                    @elseif($datum->nilai3 >= 75 && $datum->nilai3 <= 85)
                                        Baik
                                    @elseif($datum->nilai3 >= 65 && $datum->nilai3 <= 74)
                                        Cukup
                                    @elseif($datum->nilai3 >= 55 && $datum->nilai3 <= 64)
                                        Kurang
                                    @else
                                        Tidak Lulus
                                    @endif
                                @else
                                    &nbsp;
                                @endif
                            </td>
                            <td>
                                @if ($datum->nilai4 == !null)
                                    @if ($datum->nilai4 >= 86)
                                        Memuaskan
                                    @elseif($datum->nilai4 >= 75 && $datum->nilai4 <= 85)
                                        Baik
                                    @elseif($datum->nilai4 >= 65 && $datum->nilai4 <= 74)
                                        Cukup
                                    @elseif($datum->nilai4 >= 55 && $datum->nilai4 <= 64)
                                        Kurang
                                    @else
                                        Tidak Lulus
                                    @endif
                                @else
                                    &nbsp;
                                @endif
                            </td>
                            <td>
                                @if ($datum->nilai5 == !null)
                                    @if ($datum->nilai5 >= 86)
                                        Memuaskan
                                    @elseif($datum->nilai5 >= 75 && $datum->nilai5 <= 85)
                                        Baik
                                    @elseif($datum->nilai5 >= 65 && $datum->nilai5 <= 74)
                                        Cukup
                                    @elseif($datum->nilai5 >= 55 && $datum->nilai5 <= 64)
                                        Kurang
                                    @else
                                        Tidak Lulus
                                    @endif
                                @else
                                    &nbsp;
                                @endif
                            </td>
                            <td>
                                <center>
                                    <a href="{{ url('/sertifikat/video-editing-fotografi/edit/' . $datum->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/sertifikat/video-editing-fotografi/cetak/' . $datum->id . '/sertifikat') }}"
                                        target="_blank" class="btn btn-success my-2">Print Sertifikat PDF</a>
                                    <a href="{{ url('/sertifikat/video-editing-fotografi/cetak/' . $datum->id . '/print-depan') }}"
                                        target="_blank" class="btn btn-success mb-2">
                                        Print Sertifikat
                                    </a>
                                    <a href="{{ url('/sertifikat/video-editing-fotografi/cetak/' . $datum->id . '/nilai') }}"
                                        target="_blank" class="btn btn-success">Print Nilai</a>
                                    <a href="{{ url('/sertifikat/video-editing-fotografi/hapus/' . $datum->id) }}"
                                        class="btn btn-danger  my-2">Hapus</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="25">
                            <center>
                                <h3>Data Kosong</h3>
                            </center>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>

    </div>

@endsection
