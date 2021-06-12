<?php

namespace App\Http\Controllers;

use App\Models\Perpus;
use App\Exports\PerpusExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpus = perpus::join('Jenis_Buku', 'buku.id', '=', 'Jenis_Buku.id')->get();
        return view('perpus_0175', ['buku'=> $perpus]);
    }
    /**
     * Buat excel
     */
    public function export()
    {
        return Excel::download(new PerpusExport, 'Data_1461900175.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpus_tambah_0175');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        perpus::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect('perpus_0175');
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
    {
        $perpus = perpus::find($id);
        return view('perpus_edit_0175', ['perpus_0175' => $perpus]);
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
        $perpus = perpus::find($id);
        $perpus->id = $request->id;
        $perpus->judul = $request->judul;
        $perpus->tahun_terbit = $request->tahun_terbit;
        $perpus->save();

        return redirect('perpus_0175');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perpus = perpus::find($id);
        $perpus->delete();

        return redirect ('perpus_0175');
    }
}