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
        $sources = Source::orderBy('source_id', 'asc')->paginate(10);
        return view('source.index', compact('sources'));
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
            'sumber' => 'required|string|min:1|max:255|unique:sources,sumber',
        ]);

        $request->user()->sources()->create($request->all());

        return redirect()->route('source.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Source $source)
    {
        $latest = $request->user()->domains()
            ->where('source_id', $source->source_id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('source.show', compact('source', 'latest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('source.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $request->validate([
            'sumber' => 'required|string|min:1|max:255|unique:sources,sumber,' . $source->source_id . ',source_id',
        ]);

        $data = $request->all();

        // Set user_id if not exists
        if (!isset($data['user_id'])) {
            $data['user_id'] = $request->user()->id;
        }

        $source->update($data);

        return redirect()->route('source.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->delete();

        return redirect()->route('source.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
