<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index', [
            'obat' => $obat
        ]);
    }

    public function create()
    {
        
        return view('obat.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'kode_obat' => 'required|unique:obat,nama_obat',
            'nama_obat'=> 'required',
            'merk'=> 'required',
            'jenis'=> 'required',
            'satuan'=> 'required',
            'golongan'=> 'required',
            'kemasan'=> 'required',
            'harga_jual'=> 'required',
            'stok'=> 'required',
        ]);
        $array = $request->only([
            'kode_obat', 'nama_obat', 'merk', 'jenis', 'satuan', 'golongan',
            'kemasan', 'harga_jual', 'stok'
        ]);
        $obat = obat::create($array);
        return redirect()->route('obat.index')->with('success_message', 'Berhasil menambah obat');
    }

    public function edit($id)
    {
    //Menampilkan Form Edit
    $obat = obat::find($id);
    if (!$obat) return redirect()->route('obat.index')
    ->with('error_message', 'Obat dengan id = '.$id.'tidak ditemukan');
    return view('obat.edit', [
    'obat' => $obat,
    ]);
    }

    public function update(Request $request, $id)
    {
    //Mengedit Data Standar Kompetensi
    $request->validate([
       'kode_obat' => 'required|unique:obat,nama_obat',
            'nama_obat'=> 'required',
            'merk'=> 'required',
            'jenis'=> 'required',
            'satuan'=> 'required',
            'golongan'=> 'required',
            'kemasan'=> 'required',
            'harga_jual'=> 'required',
            'stok'=> 'required',
    ]);
    $obat = obat::find($id);
    $obat->kode_obat = $request->kode_obat;
    $obat->nama_obat = $request->nama_obat;
    $obat->merk = $request->merk;
    $obat->jenis = $request->jenis;
    $obat->satuan = $request->satuan;
    $obat->golongan = $request->golongan;
    $obat->kemasan = $request->kemasan;
    $obat->harga_jual = $request->harga_jual;
    $obat->stok = $request->stok;
    $obat->save();
    return redirect()->route('obat.index')->with('success_message', 'Berhasil mengubah data Obat');
    } 

    public function destroy(Request $request, $id)
    {
    //Menghapus
    $obat = obat::find($id);
    if ($obat) $obat->delete();
    return redirect()->route('obat.index')->with('success_message', 'Berhasil menghapus obat ' . $obat->nama_obat. ' !');
    }
}
