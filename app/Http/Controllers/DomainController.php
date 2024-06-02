<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Source;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $domains = $request->user()->domains()
            ->with('source')
            ->orderBy('bidding_time', 'desc');

        $source = null;
        $sources = Source::all();

        if ($request->has('source_id')) {
            if (empty($request->source_id)) {
                return redirect()->route('domain.index');
            }

            if ($request->source_id == 'all') {
                $domains = $domains->paginate(10);
                return view('domain.index', compact('domains', 'sources', 'source'));
            }

            if ($request->source_id == 'none') {
                $domains->whereNull('source_id');
            } else {
                $source = Source::findOrFail($request->source_id);
                $domains->where('source_id', $request->source_id);
            }
        }

        $domains = $domains->paginate(10);

        return view('domain.index', compact('domains', 'sources', 'source'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::all();
        return view('domain.create', compact('sources'));
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
            'name' => [
                'required',
                new \App\Rules\FQDN(),
                'unique:domains,name'
            ],
            'source_id' => 'required|exists:sources,source_id',
            'da' => 'required',
            'pa' => 'required',
            'qa' => 'required',
            'os' => 'required',
            'ss' => 'required',
            'bidding_time' => 'required|date'
        ]);

        $request->user()->domains()->create($request->all());

        $params = [];

        if ($request->has('source_id')) {
            $params['source_id'] = $request->source_id;
        }

        return redirect()->route('domain.index', $params)
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        return view('domain.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        $sources = Source::all();
        return view('domain.edit', compact(['domain', 'sources']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        $request->validate([
            'name' => [
                'required',
                new \App\Rules\FQDN(),
                'unique:domains,name,' . $domain->id
            ],
            'source_id' => 'required|exists:sources,source_id',
            'da' => 'required',
            'pa' => 'required',
            'qa' => 'required',
            'os' => 'required',
            'ss' => 'required',
            'bidding_time' => 'required|date'
        ]);

        $domain->update($request->all());

        return redirect()->route('domain.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect()->route('domain.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
