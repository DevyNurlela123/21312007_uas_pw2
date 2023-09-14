<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Genre;
use RealRashid\SweetAlert\Fecades\Alert;

class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uas = Uas::all();
        return view('uas.index', compact('uas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('uas.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uas = new uas;

        $request->validate([
            'npm'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'genre'=>'required',
        ]);

        $uas ->npm = $request->npm;
        $uas ->nama = $request->nama;
        $alamat ->tahun = $request->alamat;
        $uas ->genre_id = $request->genre;

        $uas->save();
        return redirect('/uas');
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
        //
        $uas = Uas::where('id',$id)->first();

        return view('Uas.edit',compact('uas'));
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
        //
        $uas = new uas;

        $request->validate([
            'npm'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'genre'=>'required',
        ]);

        $uas = Uas::find($id);
        $uas ->npm = $request->npm;
        $uas ->nama = $request->nama;
        $alamat ->tahun = $request->alamat;
        $film ->genre_id = $request->genre_id;

        $ubah = $film->save();
        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/uas');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/uas');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Uas::find($id);
        $uas->delete();

        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/uas');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/uas');
        }

        Alert::info('Info', 'Data berhasil');
        return redirect('/uas');

    }
}
