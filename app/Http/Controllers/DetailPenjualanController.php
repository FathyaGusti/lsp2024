<?php

namespace App\Http\Controllers;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Obat;
use PDF;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{

    public function index()
    {
        $detailpenjualan = DetailPenjualan::all();
        return view('detailpenjualan.index', [
            'detailpenjualan' => $detailpenjualan
        ]);
    }

    public function create()
    {
    //Menampilkan Form Tambah 
    return view(
    'detailpenjualan.create', [
    'penjualan' => Penjualan::all(),
    'obat' => Obat::all(),
    ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'sub_total_jual' => 'required',
            'id_obat' => 'required'
        ]);

        $array = $request->only([
            'id_penjualan',
            'jumlah_jual',
            'harga_jual',
            'sub_total_jual',
            'id_obat'
        ]);
        $tambah = DetailPenjualan::create($array);
        return redirect()->route('detailpenjualan.index')->with('success_message', 'Terimakasih telah Menambahkan Detail Penjualan ');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $detailpenjualan = DetailPenjualan::find($id);
        if (!$detailpenjualan) return redirect()->route('detailpenjualan.index')
            ->with('error_message', 'Data Detail Penjualan dengan id = ' . $id . ' tidak ditemukan');
        return view('detailpenjualan.edit', [
            'detailpenjualan' => $detailpenjualan,
            'penjualan' => Penjualan::all(),
            'obat' => Obat::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $detailpenjualan = DetailPenjualan::find($id);
        $detailpenjualan->id_penjualan = $request->id_penjualan;
        $detailpenjualan->id_obat = $request->id_obat;
        $detailpenjualan->jumlah_jual = $request->jumlah_jual;
        $detailpenjualan->harga_jual = $request->harga_jual;
        $detailpenjualan->sub_total_jual = $request->sub_total_jual;
        $detailpenjualan->save();
        return redirect()->route('detailpenjualan.index')->with('success_message', 'Berhasil Mengedit detail pelanggan');
    }

    public function destroy(Request $request, $id)
    {
               //Delete
               $detailpenjualan = DetailPenjualan::find($id);
                if ($detailpenjualan) $detailpenjualan->delete();
                    return redirect()->route('detailpenjualan.index')->with('success_message', 'Berhasil menghapus Detail Penjualan ');
 } 
 public function exportpdf2(){
    $data = Detailpenjualan::all();

    view()->share('data',$data);
    $pdf = PDF::loadview('detailpenjualan-pdf');
    return $pdf->download('Datadetailpenjualan.pdf');
}
    
}