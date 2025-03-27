@extends('layout.main')
@section('title', 'Elmuna - Daftar Digital Marketing')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Pendaftaran Kursus Digital Marketing</h3>
            </center>
        </div>
        <div class="card-body">
            <form action="{{ url('/tambah-digital_marketing') }}" method="post">
                @csrf
                <center>
                    <h5>Identitas Peserta</h5>
                </center>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik"
                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}">
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select select2 @error('jk') is-invalid @enderror"
                        data-placeholder="Pilih Jenis Kelamin">
                        <option></option>
                        <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan"
                        class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}">
                    @error('kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten"
                        class="form-control @error('kabupaten') is-invalid @enderror" value="{{ old('kabupaten') }}">
                    @error('kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" name="kode_pos" id="kode_pos"
                        class="form-control @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos') }}">
                    @error('kode_pos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" name="agama" id="agama"
                        class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}">
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Pekerjaan</label>
                    <select name="status" id="status"
                        class="form-select select2 @error('status') is-invalid @enderror"
                        data-placeholder="Pilih Status Pekerjaan">
                        <option></option>
                        <option value="Bekerja" {{ old('status') == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                        <option value="Pelajar/Mahasiswa" {{ old('status') == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>
                            Pelajar/Mahasiswa</option>
                        <option value="Tidak Bekerja" {{ old('status') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak
                            Bekerja</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu"
                        class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ old('nama_ibu') }}">
                    @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah"
                        class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ old('nama_ayah') }}">
                    @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">No. WA</label>
                    <input type="text" name="telepon" id="telepon"
                        class="form-control @error('telepon') is-invalid @enderror" aria-describedby="teleponHelp"
                        value="{{ old('telepon') }}" placeholder="Ganti 08 menjadi 628">
                    <div id="teleponHelp" class="form-text">Misal 08131111222 menjadi 6281311112222</div>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="paket" class="form-label">Pilih Paket</label>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_pemula" class="form-check-input"
                            value="PAKET PEMULA" {{ in_array('PAKET PEMULA', old('paket', [])) ? 'checked' : '' }}>
                        <label for="paket_pemula" class="form-check-label">PAKET PEMULA</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_mahir" class="form-check-input"
                            value="PAKET MAHIR" {{ in_array('PAKET MAHIR', old('paket', [])) ? 'checked' : '' }}>
                        <label for="paket_mahir" class="form-check-label">PAKET MAHIR</label>
                    </div>
                    @error('paket')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-2">
                    <center>
                        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Batal</button>
                        <button type="submit" class="btn btn-success">Daftar</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(".select2").select2({
            theme: "bootstrap-5",
        });
    </script>
@endpush
