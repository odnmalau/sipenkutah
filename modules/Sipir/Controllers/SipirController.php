<?php

namespace Modules\Sipir\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Sipir\Requests\Store;
use Modules\Sipir\Requests\Update;
use Modules\Sipir\Models\Sipir;
use Modules\Sipir\Tables\SipirTableView;

class SipirController extends Controller
{
    public function index()
    {
        return SipirTableView::make()->view('sipir::index');
    }

    public function create()
    {
        return view('sipir::create');
    }

    public function store(Store $request)
    {
        $attr = $request->validated();

        $foto = request()->file('foto');
        if ($foto) {
            $fileName = time().'_'.$foto->getClientOriginalName();
            $pathToFile = $foto->storeAs("sipir", $fileName, 'public');
        } else {
            $pathToFile = null;
        }

        $attr['foto'] = $pathToFile;
        Sipir::create($attr);

        return redirect()->back()->withSuccess('Sipir saved');
    }

    public function show(Sipir $sipir)
    {
        return view('sipir::show', compact('sipir'));
    }

    public function edit(Sipir $sipir)
    {
        return view('sipir::edit', compact('sipir'));
    }

    public function update(Update $request, Sipir $sipir)
    {
        $attr = $request->validated();

        $foto = request()->file('foto');
        if ($foto) {
            Storage::disk('public')->delete($sipir->foto);
            $fileName = time().'_'.$foto->getClientOriginalName();
            $pathToFile = $foto->storeAs("sipir", $fileName, 'public');
        } else {
            $pathToFile = $sipir->foto;
        }

        $attr['foto'] = $pathToFile;

        $sipir->update($attr);

        return redirect()->back()->withSuccess('Sipir saved');
    }

    public function destroy(Sipir $sipir)
    {
        Storage::disk('public')->delete($sipir->foto);
        $sipir->delete();

        return redirect()->back()->withSuccess('Sipir deleted');
    }
}
