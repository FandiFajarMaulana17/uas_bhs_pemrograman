<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_marketing;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DataMarketingController extends Controller
{

    public function index()
    {
        $data = Data_marketing::all();
        if (!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data marketing not found',
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Successfully retrieved data',
                    'data' => $data,
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_karyawan' => 'required',
            'product' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'keterangan_penjualan' => 'required',
            'keterangan_produk' => 'required',
            'target_pasar' => 'required',
        ]);
    
        DB::connection('mysql')->table('data_marketings')->insert([
            'nama_karyawan' => $request->nama_karyawan,
            'product' => $request->product,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'keterangan_penjualan' => $request->keterangan_penjualan,
            'keterangan_produk' => $request->keterangan_produk,
            'target_pasar' => $request->target_pasar,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
        return response()->json(['success' => true, 'message' => 'data marketing success di tambah'], 201);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nama_karyawan' => 'nullable',
            'product' => 'nullable',
            'jumlah' => 'nullable',
            'harga' => 'nullable',
            'keterangan_penjualan' => 'nullable',
            'keterangan_produk' => 'nullable',
            'target_pasar' => 'nullable',
        ]);
    
        $data_marketings = DB::connection('mysql')->table('data_marketings')->where('id', $id)->first();
        
        if (is_null($data_marketings)) {
            return response()->json([
                'success' => false,
                'message' => 'data_marketings not found',
            ], 404);
        }
    
        $updateData = [
            'nama_karyawan' => $request->nama_karyawan ? $request->nama_karyawan : $data_marketings->nama_karyawan,
            'product' => $request->product ? $request->product : $data_marketings->product,
            'jumlah' => $request->jumlah ? $request->jumlah : $data_marketings->jumlah,
            'harga' => $request->harga ? $request->harga : $data_marketings->harga,
            'keterangan_penjualan' => $request->keterangan_penjualan ? $request->keterangan_penjualan : $data_marketings->keterangan_penjualan,
            'keterangan_produk' => $request->keterangan_produk ? $request->keterangan_produk : $data_marketings->keterangan_produk,
            'target_pasar' => $request->target_pasar ? $request->target_pasar : $data_marketings->target_pasar,
            'updated_at' => Carbon::now()
        ];
    
        DB::connection('mysql')->table('data_marketings')->where('id', $id)->update($updateData);
        $data_marketings_update = DB::connection('mysql')->table('data_marketings')->where('id', $id)->first();
    
        return response()->json([
            'success' => true,
            'message' => 'Data marketings updated successfully',
            'data' => $data_marketings_update
        ], 200);
    
        }

        
    public function show($id)
    {
        $data_marketings = DB::connection('mysql')->table('data_marketings')->where('id', $id)->first();
    
        if (is_null($data_marketings)) {
            return response()->json([
                'success' => false,
                'message' => 'Data marketings not found',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Data marketings found',
            'data_marketings' => $data_marketings
        ], 200);
    }

    public function destroy($id)
    {
        $data_marketings = DB::connection('mysql')->table('data_marketings')->where('id', $id)->first();
        if (is_null($data_marketings)) {
            return response()->json([
                'success' => false,
                'message' => 'Data marketings Not Found',
            ], 404);
        }
    
        DB::connection('mysql')->table('data_marketings')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data marketings has been Deleted',
        ], 200);
    }

}
