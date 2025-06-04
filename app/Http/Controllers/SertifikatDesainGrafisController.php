<?php

namespace App\Http\Controllers;

use App\Models\DesainGrafis;
use Illuminate\Http\Request;
use App\Models\SertifikatDesainGrafis;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatDesainGrafisController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatDesainGrafis::orderBy('id', 'desc')
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
            $data = SertifikatDesainGrafis::latest()->get();
        }

        return view('admin.sertifikat.desain_grafis.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = DesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatDesainGrafis::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function edit($id)
    {
        $data = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatDesainGrafis::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function delete($id)
    {
        $data = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.hapus', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.cetak-nilai', ['data' => $data]);
    }

    function print_depan($id)
    {
        $data = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.cetak-print-depan', ['data' => $data]);
    }
}
