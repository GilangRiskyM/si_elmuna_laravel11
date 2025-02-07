@extends('layout.admin')
@section('title', 'Kuitansi')
@section('content')
    <center>
        <h1 class="my-3">Kuitansi</h1>
    </center>
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="{{ url('/kuitansi') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="{{ url('/kuitansi') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Guna Membayar</th>
                    <th>Jumlah Diterima</th>
                    <th>Terbilang</th>
                    <th>Pembayaran</th>
                    <th>Penerima</th>
                    <th>Cara Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1 + ($data->currentPage() - 1) * $data->perPage();
                @endphp
                @if ($data->count() > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>
                                {{ $datum->guna_byr1 }} <br>
                                {{ $datum->guna_byr2 }} <br>
                                {{ $datum->guna_byr3 }}
                            </td>
                            <td>Rp. {{ number_format($datum->jumlah, 0, ',', '.') }} ,-</td>
                            <td>{{ $datum->terbilang }}</td>
                            <td>{{ $datum->pembayaran }}</td>
                            <td>{{ $datum->penerima }}</td>
                            <td>{{ $datum->cara_bayar }}</td>
                            <td>
                                <a href="{{ url('/kuitansi/edit/' . $data->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ url('/kuitansi/cetak/' . $data->id) }}" target="_blank"
                                    class="btn btn-info my-2">Print</a>
                                <a href="{{ url('/kuitansi/hapus/' . $data->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">
                            <center>
                                <h3>Data Kosong</h3>
                            </center>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{ $data->appends(request()->query())->links() }}
@endsection
