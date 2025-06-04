<?php

namespace App\Http\Controllers;

use App\Models\Mengemudi;
use Illuminate\Http\Request;
use App\Models\SertifikatMengemudi;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatMengemudiController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatMengemudi::orderBy('id', 'desc')
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
            $data = SertifikatMengemudi::latest()->get();
        }

        return view('admin.sertifikat.mengemudi.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = Mengemudi::findOrFail($id);

        return view('admin.sertifikat.mengemudi.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatMengemudi::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/mengemudi');
    }

    function edit($id)
    {
        $data = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatMengemudi::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/mengemudi');
    }

    function delete($id)
    {
        $data = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.hapus', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/mengemudi');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.cetak-nilai', ['data' => $data]);
    }

    function print_depan($id)
    {
        $data = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.cetak-print-depan', ['data' => $data]);
    }
}
