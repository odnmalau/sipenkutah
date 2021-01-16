<?php

namespace Modules\Sipir\Controllers;

use Illuminate\Routing\Controller;
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
        $sipir = Sipir::create($request->validated());

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $sipir->addMediaFromRequest('foto')->toMediaCollection('sipir');
        }

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
        $sipir->update($request->validated());

        return redirect()->back()->withSuccess('Sipir saved');
    }

    public function destroy(Sipir $sipir)
    {
        $sipir->delete();

        return redirect()->back()->withSuccess('Sipir deleted');
    }
}
