<?php

namespace App\Http\Controllers;

use App\Models\Pemrograman;
use Illuminate\Http\Request;
use App\Models\SertifikatPemrograman;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatPemrogramanController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatPemrograman::orderBy('id', 'desc')
                ->where('no_sertifikat', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('tempat_lahir', 'LIKE', '%' . $cari . '%')
                ->orWhere('nis', 'LIKE', '%' . $cari . '%')
                ->orWhere('program', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel1', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel2', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel3', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel4', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel5', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai1', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai2', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai3', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai4', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai5', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $data = SertifikatPemrograman::latest()->get();
        }

        return view('admin.sertifikat.pemrograman.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = Pemrograman::findOrFail($id);

        return view('admin.sertifikat.pemrograman.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatPemrograman::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/pemrograman');
    }

    function edit($id)
    {
        $data = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatPemrograman::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/pemrograman');
    }

    function delete($id)
    {
        $data = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.hapus', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/pemrograman');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.cetak-nilai', ['data' => $data]);
    }
}
