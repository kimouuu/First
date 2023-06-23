<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index', [
            'reservasi' => $reservasi
        ]);
    }
    public function create()
    {
        return view('reservasi.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Company_Name' => 'required',
            'Tanggal' => 'required',
            'Phone' => 'required',
            'Name_Project'  => 'required',
            'Status'  => 'required',
        ]);

        $array = $request->only([
            'Nama', 'Company_Name', 'Tanggal', 'Phone', 'Name_Project', 'Status'
        ]);

        Reservasi::create($array);

        return redirect()->route('reservasi.index')
            ->with('success_message', 'Berhasil menambah Reservasi baru');
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
        $reservasi = Reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')
            ->with('error_message', 'reservasi dengan id = ' . $id . ' tidak ditemukan');
        return view('reservasi.edit', [
            'reservasi' => $reservasi,
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
        $fields = ['Nama', 'Company_Name', 'Tanggal', 'Phone', 'Status'];
        $reservasi = Reservasi::find($id);
        foreach ($fields as $f) {
            if (isset($request[$f]) && !empty($request[$f])) {
                $reservasi[$f] = $request[$f];
            }
        }
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil mengubah reservasi');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::find($id);
        if ($reservasi) {
            $hapus = $reservasi->delete();
        }
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil');
    }
}
