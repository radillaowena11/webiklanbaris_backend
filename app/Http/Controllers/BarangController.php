<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Barang;

class BarangController extends Controller
{
    public function index() {
        $data = Barang::all();
        return response($data);
    }
    public function show($id) {
        $data = Barang::where('id', $id)->get();
        return response ($data);
    }
    public function store(Request $request){
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $request->file('gambar')->move('statics/img/', $filename);
        $photo = 'statics/img'.$filename;

        try{
            $data = new Barang();
            $data->nama_barang = $request->input('nama_barang');
            $data->gambar = $photo;
            $data->deskripsi = $request->input('deskripsi');
            $data->harga = $request->input('harga');
            $data->stok = $request->input('stok');
            $data->lokasi = $request->input('lokasi');
            $data->kontak = '123123';
            $data->save();
            return response()->json([
                'status' => '1',
                'message' => 'Tambah data Barang berhasil'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status' => '0',
                'message' => 'Tambah data barang gagal'
            ]);
        }
    }
    public function update(Request $request, $id) {
        // $file = $request->file('gambar');
        // if($file){
        //     $filename = $file->getClientOriginalName();
        //     $request->file('gambar')->move('statics/img/', $filename);
        //     $photo = 'statics/img'.$filename;  

        // }else{
        //     $barang = Barang::find($id);
        //     $photo = $barang->gambar;
        // }
        try{
            $data = Barang::find($id);
            $data->nama_barang = $request->input('nama_barang');
            $data->gambar = $request->input('gambar');
            $data->deskripsi = $request->input('deskripsi');
            $data->harga = $request->input('harga');
            $data->stok = $request->input('stok');
            $data->lokasi = $request->input('lokasi');
            $data->kontak = $request->input('kontak');
            $data->save();

            return response()->json([
                'status' => '1',
                'message' => 'Ubah data barang berhasil'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status' => '0',
                'message' => 'Ubah data barang gagal'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => $e->getMessage()
            ]);
        }
    }
    public function destroy($id){
        try{
            $data = Barang::where('id', $id)->first();
            $data->delete();

            return response()->json([
                'status' => '1',
                'message' => 'Hapus data barang berhasil'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status' => '0',
                'message' => 'Hapus data barang gagal'
            ]);
        }
}
    // public function barang() {
    //     $data = "Data All Barang";
    //     return response()->json($data, 200);
    // }

    // public function barangAuth() {
    //     $data = "Welcome " . Auth::user()->name;
    //     return response()->json($data, 200);
    // }
}
