<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'karyawan.create',
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Karyawan
        $request->validate([
            'Nama',
            'Phone',
            'Jabatan',
        ]);
        $array = $request->only([
            'Nama',
            'Phone',
            'Jabatan',
        ]);
        $karyawan = Karyawan::create($array);
        return redirect()->route('karyawan.index')
            ->with('success_message', 'Berhasil menambah Karyawan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit Karyawan
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')
            ->with('error_message', 'karyawan dengan id = ' . $id . ' tidak ditemukan');
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mengedit Data Karyawan    
        $request->validate([
            'Nama' => 'required',
            'Phone' => 'required',
            'Jabatan' => 'required',
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->Nama = $request->Nama;
        $karyawan->Phone = $request->Phone;
        $karyawan->Jabatan = $request->Jabatan;
        $karyawan->save();
        return redirect()->route('karyawan.index')
            ->with('success_message', 'Berhasil mengubah Karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus karyawan
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $hapus = $karyawan->delete();
        }
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil');;
    }
}
