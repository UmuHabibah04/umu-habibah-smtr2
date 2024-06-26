<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pasien = Pasien::all();
        return view("admin.pasien.index", compact("list_pasien"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi Form Input
        $validated = $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'tmp_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'gender'=> 'required',
            'email' => 'required|string',
            'alamat' => 'required',
            'kecamatan_nama' => 'required|string'
        ]);

        //Setelah divalidasi, kemudian menyimpan data

        Pasien::create($validated);  

        //Kemudian Berpindah Halaman

        return redirect('dashboard/pasien');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //memgambil data sesuai dengan id
        //queery dalam sql select where id from pasien

        $pasien = Pasien::find($id);

        //Menampilkan data

        return view('admin.pasien.show', compact('pasien'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::find($id);
        return view('admin.pasien.edit',compact('pasien'))->with('pesan','Data Berhasil di Edit',);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'tmp_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'gender'=> 'required',
            'email' => 'required|string',
            'alamat' => 'required',
            'kecamatan_nama' => 'required|string'
        ]);
        $pasien = pasien::find($id);
        $pasien->update($validated);
        return redirect('dashboard/pasien')->with('pesan','Data Berhasil di Perbarui',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = pasien::find($id);
        $pasien->delete();

        return redirect('dashboard/pasien')->with('pesan','Data Berhasil di Hapus',);
    }
}