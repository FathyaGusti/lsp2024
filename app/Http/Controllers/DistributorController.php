<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor.index', [
            'distributor' => $distributor
        ]);
    }
    public function create()
    {
        //Menampilkan Form Tambah Distributor
        return view('distributor.create');
    }
    public function store(
        Request $request
    )
    {
        //Menyimpan Data Distributor Baru
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required',
            
        ]);
        $array = $request->only([
            'nama_distributor',
            'alamat',
            'notelepon',
        ]);
        $distributor =
            Distributor::create($array);
        return redirect()->route('distributor.index')->with('success_message', 'Berhasil menambah Distributor baru');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $distributor =
            Distributor::find($id);
        if (!$distributor)
            return redirect()->route('distributor.index')
                ->with('error_message', 'Distributor dengan id' . $id . ' tidak ditemukan');
        return view('distributor.edit', ['distributor' => $distributor]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        $id
    )
    {
        //Mengedit Data Distirbutor
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required',
        ]);
        $distributor = Distributor::find($id);
        $distributor->nama_distributor = $request->nama_distributor;
        $distributor->alamat = $request->alamat;
        $distributor->notelepon = $request->notelepon;
        $distributor->save(); 
        return redirect()->route('distributor.index')->with('success_message', 'Berhasil mengubah Distributor');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        $id
    )
    {
        //Menghapus Distributor
        $distributor = Distributor::find($id);
        if ($distributor)
            $distributor->delete();
        return redirect()->route('distributor.index')
            ->with('success_message', 'Berhasil menghapus Distributor');
    }

}