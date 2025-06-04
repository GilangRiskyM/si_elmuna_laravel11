<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use App\Models\SertifikatKomputer;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatKomputerController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatKomputer::orderBy('id', 'desc')
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
            $data = SertifikatKomputer::latest()->get();
        }

        return view('admin.sertifikat.komputer.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = Komputer::findOrFail($id);

        return view('admin.sertifikat.komputer.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatKomputer::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/komputer');
    }

    function edit($id)
    {
        $data = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatKomputer::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/komputer');
    }

    function delete($id)
    {
        $data = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.hapus', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/komputer');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.cetak-nilai', ['data' => $data]);
    }

    function print_depan($id)
    {
        $data = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.cetak-print-depan', ['data' => $data]);
    }
}
