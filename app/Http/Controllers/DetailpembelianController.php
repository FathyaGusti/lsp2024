<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\Detailpembelian;
use App\Models\Obat;
use Illuminate\Http\Request;
use PDF;

class DetailpembelianController extends Controller
{
    public function index()
    {
        $depem = Detailpembelian::all();
        return view('detailpembelian.index', [
            'detailpembelian' => $depem
        ]);
    }
    public function create(){
        //Menampilkan Form Tambah Pembelian
       return view('detailpembelian.create', [ 
        'pembelian' => Pembelian::all(), //Mengirimkan semua data Pembelian ke Modal pada halaman create
        'obat' => Obat::all()
            ]);
       }
       public function store(
        Request $request){
         //Menyimpan Data Pembelian
        $request->validate([
        'id_pembelian' => 'required',
        'tgl_kadaluarsa' => 'required',
        'harga_beli' => 'required',
        'jumlah_beli' => 'required',
        'sub_total_beli' => 'required',
        'persen_margin_jual' => 'required',
        'id_obat'=> 'required'
        ]);
        $array = $request->only([
            'id_pembelian',
            'tgl_kadaluarsa',
            'harga_beli',
            'jumlah_beli',
            'sub_total_beli',
            'persen_margin_jual',
            'id_obat'
        ]);
        $depem = Detailpembelian::create($array);
        return redirect()->route('detailpembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian');
        }
        public function edit($id)
    {
        //Menampilkan Form Edit
        $depem =
            Detailpembelian::find($id);
        if (!$depem)
            return redirect()->route('detailpembelian.index')
                ->with('error_message', 'pembelian dengan id' . $id . ' tidak ditemukan');
        return view('detailpembelian.edit', ['pembelian' => $depem,
        'pembelian' => Pembelian::all(),
        'obat' => Obat::all()

    ]);
        
    }
    public function update(
        Request $request,
        $id
    )
    {
        //Mengedit Data Pembelian
        $request->validate([
            'id_pembelian' => 'required',
            'tgl_kadaluarsa' => 'required',
            'harga_beli' => 'required',
            'jumlah_beli' => 'required',
            'sub_total_beli' => 'required',
            'persen_margin_jual' => 'required',
            'id_obat'=> 'required'
        ]);
        $depem = Detailpembelian::find($id);
        $depem->id_pembelian = $request->id_pembelian;
        $depem->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $depem->harga_beli = $request->harga_beli;
        $depem->jumlah_beli = $request->jumlah_beli;
        $depem->id_obat = $request->id_obat;
        $depem->save(); 
        return redirect()->route('detailpembelian.index')->with('success_message', 'Berhasil mengubah Detail Pembelian');
    }
    public function destroy(Request $request, $id)
    {
    //Menghapus
    $depem = Detailpembelian::find($id);
    if ($depem) $depem->delete();
    return redirect()->route('detailpembelian.index')->with('success_message', 'Berhasil menghapus Detail Pembelian ',' !');
    }
    public function exportpdf(){
        $data = Detailpembelian::all();

        view()->share('data',$data);
        $pdf = PDF::loadview('detailpembelian-pdf');
        return $pdf->download('Datadetailpembelian.pdf');
    }
    
}
