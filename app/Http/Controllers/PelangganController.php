<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use createPDF;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggan' => $pelanggan
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
            'pelanggan.create',
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

        $array = $request->only([
            'Nama', 'Phone', 'Email', 'Alamat'
        ]);
        $array['password'] = bcrypt($array['password']);
        $pelanggan = Pelanggan::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
        // $request->validate([
        //     'Nama',
        //     'Phone',
        //     'Email',
        //     'Alamat',

        // ]);
        // $array = $request->only([
        //     'Nama',
        //     'Phone',
        //     'Email',
        //     'Alamat',
        // ]);
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menambah Pelanggan Baru');
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
    { {
            //Menampilkan Form Edit
            $pelanggan = Pelanggan::find($id);
            if (!$pelanggan) return redirect()->route('pelanggan.index')
                ->with('error_message', 'pelanggan dengan id = ' . $id . ' tidak ditemukan');
            return view('pelanggan.edit', [
                'pelanggan' => $pelanggan,
            ]);
        }
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
        //Mengedit Data Pelanggan
        $request->validate([
            'pelanggan' =>
            'required|unique:pelanggan,pelanggan,' . $id
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->Nama = $request->Nama;
        $pelanggan->Phone = $request->Phone;
        $pelanggan->Email = $request->Email;
        $pelanggan->Alamat = $request->Alamat;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil mengubah Pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)

    //Menghapus pelanggan
    {

        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) $pelanggan->delete();
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menghapus Pelanggan');
    }
}
