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
        $domains = $request->user()->domains()->join('sources', 'sources.id', '=', 'domains.source_id')->orderBy('bidding_time', 'desc')->paginate(10);
        return view('domain.index', compact('domains'));
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
            'da' => 'required',
            'pa' => 'required',
            'qa' => 'required',
            'os' => 'required',
            'ss' => 'required',
            'bidding_time' => 'required|date'
        ]);

        $request->user()->domains()->create($request->all());

        return redirect()->route('domain.index')
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
        return view('domain.edit', compact('domain'));
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
