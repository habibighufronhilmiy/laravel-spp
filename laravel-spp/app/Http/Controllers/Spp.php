<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SppModel;
use App\Exports\SppExport;
use Maatwebsite\Excel\Facades\Excel;
class Spp extends Controller
{
    public function index(){
        $pembayaran = SppModel::all();
        $data =[
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];
        return view('barang.index', $data);
    }
    public function save(Request $request){
        SppModel::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('pembayaran'))->with('dataTambah', 'Data Berhasil Di Tambah');
    }
    public function delete($id){
        SppModel::destroy($id);
    return redirect()->to(url('pembayaran'))->with('dataDelete', 'Data Berhasil Di Hapus');
    }
    public function edit($id){
        $data = [
            'title' => 'Edit Data Spp | Myapp',
            'active' => 'Spp',
            'pembayaran' => SppModel::find($id)
        ];
        return view('pembayaran.edit', $data);
    }
    public function update(Request $request, $id){
        $pembayaran = SppModel::find($id);
        $pembayaran->update($request->except(['_token', '_method']));

        return redirect()->to(url('pembayaran'))->with('dataEdit', 'Data Berhasil Di Edit');
    }
    public function exportExcel(){
        return Excel::download(new SppExport, 'spp-excel.xlsx');
    }
}
