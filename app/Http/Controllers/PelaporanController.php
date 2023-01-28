<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Siswa $siswa)
    {
        return view('pelaporan.create', [
            'siswa' => $siswa
        ]);
    }

    public function list()
    {
        return view('pelaporan.index', ['pelaporans' => Pelaporan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pelaporan.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lokasi'=>'required',
            'keterangan'=>'required',
            'foto'=>'required'         
        ]);
        $foto = $request->file('foto');
        $name = time().'.'.$foto->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $foto->move($destinationPath, $name);

        Pelaporan::create([
            'siswa_id'=>$request->get('nama'),
            'kategori_id'=>$request->get('kategori_id'),
            'lokasi'=>$request->get('lokasi'),
            'keterangan'=>$request->get('keterangan'),
            'foto'=>$name
        ]);
        return redirect()->back()->with('message',  'Pelaporan berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('pelaporan.detail', compact('pelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
