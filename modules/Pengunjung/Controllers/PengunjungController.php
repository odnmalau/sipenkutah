<?php

namespace Modules\Pengunjung\Controllers;

use Illuminate\Routing\Controller;
use Modules\Pengunjung\Requests\Store;
use Modules\Pengunjung\Requests\Update;
use Modules\Pengunjung\Models\Pengunjung;
use Modules\Pengunjung\Tables\PengunjungTableView;

class PengunjungController extends Controller
{
    public function index()
    {
        return PengunjungTableView::make()->view('pengunjung::index');
    }

    public function create()
    {
        return view('pengunjung::create');
    }

    public function store(Store $request)
    {
        Pengunjung::create($request->validated());

        return redirect()->back()->withSuccess('Pengunjung saved');
    }

    public function show(Pengunjung $pengunjung)
    {
        return view('pengunjung::show', compact('pengunjung'));
    }

    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung::edit', compact('pengunjung'));
    }

    public function update(Update $request, Pengunjung $pengunjung)
    {
        $pengunjung->update($request->validated());

        return redirect()->back()->withSuccess('Pengunjung saved');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect()->back()->withSuccess('Pengunjung deleted');
    }
}
