<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DigitalMarketing;
use App\Models\SertifikatDigitalMarketing;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatDigitalMarketingController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatDigitalMarketing::orderBy('id', 'desc')
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
            $data = SertifikatDigitalMarketing::latest()->get();
        }

        return view('admin.sertifikat.digital_marketing.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = DigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatDigitalMarketing::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function edit($id)
    {
        $data = SertifikatDigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatDigitalMarketing::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function delete($id)
    {
        $sql = SertifikatDigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatDigitalMarketing::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/desain-grafis');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatDigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatDigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.cetak-nilai', ['data' => $sql]);
    }

    function print_depan($id)
    {
        $data = SertifikatDigitalMarketing::findOrFail($id);
        return view('admin.sertifikat.digital_marketing.cetak-print-depan', ['data' => $data]);
    }
}
