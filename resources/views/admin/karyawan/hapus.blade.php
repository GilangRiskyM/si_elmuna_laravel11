@extends('layout.admin')
@section('title', 'Hapus Karyawan')
@section('content')
    <center>
        <h2>Hapus Data Karyawan</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <div class="alert alert-danger" role="alert">
                <h3><i class='bx bx-error'></i> Data yang dihapus tidak dapat dikembalikan!</h3>
            </div>
            <h4><b>Identitas Karyawan</b></h4>
            <h4>
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $data->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>:</td>
                        <td>
                            <img src="{{ asset('tanda_tangan' . '/' . $data->tanda_tangan) }}"
                                alt="Tanda Tangan {{ $data->nama }}" class="img-thumbnail" width="20%">
                        </td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="{{ url('/hapus-karyawan/' . $data->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url('/karyawan') }}" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3" type="submit">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
