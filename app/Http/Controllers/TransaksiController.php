<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\NamaBarang;
use App\Models\Project;
use App\Models\Bproject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'transaksis',
            'page_name' => 'transaksi',
            'has_scrollspy' => 1,
            'scrollspy_offset' => 100,
            'alt_menu' => 0,
        ];              
        
        return view('transaksi.index', [
            'trans' => Transaksi::all(),
            'barngs' => Barang::all(),
            'pros' => Project::all(),
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all(); 

        if ($request->id_project != '-'){
            $validateData = $request->validate([
                'id_barang'    => 'required',
                'id_project' => 'required',
                'code_project' => 'required', 
                'masuk'   => 'required',
                'keluar'     => 'required',
                'stock' => Barang::where('id', $request->id_barang)->first()->stock,
                'keterangan'        => 'required',
                'remark'   => 'required'
            ]);
            $data = $request->validate([
                'code_project' => 'required', 
                'id_project' => 'required',
                'id_nama_barang' => Barang::where('id', $request->id_barang)->first()->id_nama_barang,
                'stock'     => $validateData->stock,
            ]);
            // return $validateData;
            Transaksi::create($validateData);
            Bproject::create($data);
            
            return redirect("/transaksi");
        } else {
            $validateData = $request->validate([
                'id_barang'    => 'required',
                'id_project' => 'required',
                'code_project' => 'required', 
                'masuk'   => 'required',
                'keluar'     => 'required',
                'stock' => Barang::where('id', $request->id_barang)->first()->stock,
                'keterangan'        => 'required',
                'remark'   => 'required'
            ]);
            // return $validateData;
            Transaksi::create($validateData);
            
            return redirect("/transaksi");  
        }
        
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validateData = $request->validate([
            'tgl'    => 'required',
            'id_barang'    => 'required',
            'masuk'   => 'required',
            'keluar'     => 'required',
            'keterangan'        => 'required',
            'remark'   => 'required'
        ]);
        if(Transaksi::where('id', $transaksi->id)->update($validateData)){
            return redirect('transaksi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);
        return redirect('/transaksi');
    }
}
