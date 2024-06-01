<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Source::orderBy('source_id', 'asc')->paginate(5);
        return view('source.index', compact('mahasiswas'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'sumber' => 'required',
            //'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg'
        ]);

       

        Source::create($request->all());

        return redirect()->route('source.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Source::find($id);
        return view('source.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Source::find($id);
        return view('source.edit', compact('mahasiswa'));
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
        $request->validate([
            'namadomain' => 'required',
            'da' => 'required',
            'pa' => 'required',
            'qt' => 'required',
            'os' => 'required',
            'ss' => 'required',
            //'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        $mahasiswa = Source::find($id);
        $mahasiswa->namadomain = $request->get('namadomain');
        $mahasiswa->da = $request->get('da');
        $mahasiswa->pa = $request->get('pa');
        $mahasiswa->qt = $request->get('qt');
        $mahasiswa->os = $request->get('os');
        $mahasiswa->ss = $request->get('ss');
        $mahasiswa->biddate = date('Y-m-d', strtotime($request->get('biddate')));

        $mahasiswa->save();
        return redirect()->route('source.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Source::find($id);
        $mahasiswa->delete();
        return redirect()->route('source.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}
