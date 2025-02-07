@extends('layout.admin')
@section('title', 'Karyawan')
@section('content')
    <center>
        <h1>DATA KARYAWAN ELMUNA</h1>
    </center>
    <div class="my-3">
        <a href="{{ url('/karyawan/tambah') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <hr>
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="{{ url('/karyawan') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="{{ url('/karyawan') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanda Tangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>{{ $datum->jabatan }}</td>
                            <td>
                                <center>
                                    <img src="{{ asset('tanda_tangan' . '/' . $datum->tanda_tangan) }}"
                                        alt="Tanda Tangan {{ $datum->nama }}" class="img-thumbnail" width="10%">
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="{{ url('/karyawan/qr-code/' . $datum->id) }}" class="btn btn-info my-2">Lihat
                                        QR
                                        Code</a>
                                    <a href="{{ url('/karyawan/edit/' . $datum->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/karyawan/hapus/' . $datum->id) }}"
                                        class="btn btn-danger my-2">Hapus</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="22">
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
