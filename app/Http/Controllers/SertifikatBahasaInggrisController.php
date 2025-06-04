<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahasaInggris;
use App\Models\SertifikatBahasaInggris;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatBahasaInggrisController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatBahasaInggris::orderBy('id', 'desc')
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
            $data = SertifikatBahasaInggris::latest()->get();
        }

        return view('admin.sertifikat.bahasa_inggris.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = BahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatBahasaInggris::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/bahasa-inggris');
    }

    function edit($id)
    {
        $sql = SertifikatBahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatBahasaInggris::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/bahasa-inggris');
    }

    function delete($id)
    {
        $sql = SertifikatBahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatBahasaInggris::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/bahasa-inggris');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatBahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatBahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.cetak-nilai', ['data' => $data]);
    }

    function print_depan($id)
    {
        $data = SertifikatBahasaInggris::findOrFail($id);
        return view('admin.sertifikat.bahasa_inggris.cetak-print-depan', ['data' => $data]);
    }
}
