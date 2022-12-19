<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use PDF;

class MahasiswaController extends Controller
{
    // menampilkan halaman mahasiswa
    // public function index()
    // {
    //     $data_mahasiswa = \App\Models\Mahasiswa::all();
    //     return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]);
    // }

    public function index()
    {
        // if ($request->has('cari')) {
        //     $data_mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        // } else {
        //     $data_mahasiswa = Mahasiswa::all();
        // }
        // return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]);
        $mahasiswa = DB::table('mahasiswa')->paginate(5);
 
    	// mengirim data mahasiswa ke view index
		return view('mahasiswa.index',['mahasiswa' => $mahasiswa]);
    }


    //create data mahasiswa
    public function create(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil di input!');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        return view('mahasiswa.edit', ['mahasiswa' => $data_mahasiswa]);
    }

    //update data
    public function update(Request $request, $id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil di update!');
    }

    //delete dataa
    public function delete($id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->delete();
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil di hapus!');
    }

    //export pdf
    public function exportPdf()
    {
        $data_mahasiswa = \App\Models\Mahasiswa::all();
        $pdf = PDF ::loadview('export.mahasiswapdf',['mahasiswa'=>$data_mahasiswa]);
    	return $pdf->download('mahasiswa.pdf');
    }
}
