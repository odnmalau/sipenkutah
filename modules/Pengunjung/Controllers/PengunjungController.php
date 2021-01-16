<?php

namespace Modules\Pengunjung\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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
        $attr = $request->validated();

        $upload_identitas = request()->file('upload_identitas');
        if ($upload_identitas) {
            $fileName = time().'_'.$upload_identitas->getClientOriginalName();
            $pathToFile = $upload_identitas->storeAs("pengunjung", $fileName, 'public');
        } else {
            $pathToFile = null;
        }

        $attr['upload_identitas'] = $pathToFile;
        Pengunjung::create($attr);

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
        $attr = $request->validated();

        $upload_identitas = request()->file('upload_identitas');
        if ($upload_identitas) {
            Storage::disk('public')->delete($pengunjung->upload_identitas);
            $fileName = time().'_'.$upload_identitas->getClientOriginalName();
            $pathToFile = $upload_identitas->storeAs("pengunjung", $fileName, 'public');
        } else {
            $pathToFile = $pengunjung->upload_identitas;
        }

        $attr['upload_identitas'] = $pathToFile;

        $pengunjung->update($attr);

        return redirect()->back()->withSuccess('Pengunjung saved');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        Storage::disk('public')->delete($pengunjung->upload_identitas);
        $pengunjung->delete();

        return redirect()->back()->withSuccess('Pengunjung deleted');
    }
}
