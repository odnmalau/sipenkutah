<?php

namespace Modules\Pegawai\Controllers;

use Illuminate\Routing\Controller;
use Modules\Pegawai\Requests\Store;
use Modules\Pegawai\Requests\Update;
use Modules\Pegawai\Models\Pegawai;
use Modules\Pegawai\Tables\PegawaiTableView;

class PegawaiController extends Controller
{
    public function index()
    {
        return PegawaiTableView::make()->view('pegawai::index');
    }

    public function create()
    {
        return view('pegawai::create');
    }

    public function store(Store $request)
    {
        Pegawai::create($request->validated());

        return redirect()->back()->withSuccess('Pegawai saved');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai::show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai::edit', compact('pegawai'));
    }

    public function update(Update $request, Pegawai $pegawai)
    {
        $pegawai->update($request->validated());

        return redirect()->back()->withSuccess('Pegawai saved');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->back()->withSuccess('Pegawai deleted');
    }
}
