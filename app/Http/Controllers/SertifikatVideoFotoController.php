<?php

namespace App\Http\Controllers;

use App\Models\VideoFoto;
use Illuminate\Http\Request;
use App\Models\SertifikatVideoFoto;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatVideoFotoController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatVideoFoto::orderBy('id', 'desc')
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
            $data = SertifikatVideoFoto::latest()->get();
        }

        return view('admin.sertifikat.video_editing_fotografi.index', ['data' => $data]);
    }

    function create($id)
    {
        $data = VideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.tambah', ['data' => $data]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        SertifikatVideoFoto::create($request->all());

        sweetalert()->success('Tambah Data Berhasil!');
        return redirect('/sertifikat/video-editing-fotografi');
    }

    function edit($id)
    {
        $data = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.edit', ['data' => $data]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatVideoFoto::findOrFail($id);
        $sql->update($request->all());

        sweetalert()->success('Update Data Berhasil!');
        return redirect('/sertifikat/video-editing-fotografi');
    }

    function delete($id)
    {
        $data = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.hapus', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        $sql->delete();

        sweetalert()->success('Hapus Data Berhasil!');
        return redirect('/sertifikat/video-editing-fotografi');
    }

    function cetak_sertifikat($id)
    {
        $data = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.cetak-sertifikat', ['data' => $data]);
    }

    function cetak_nilai($id)
    {
        $data = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.cetak-nilai', ['data' => $data]);
    }
}
