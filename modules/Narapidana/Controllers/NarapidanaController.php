<?php

namespace Modules\Narapidana\Controllers;

use Illuminate\Routing\Controller;
use Modules\Narapidana\Models\Narapidana;
use Modules\Narapidana\Requests\Store;
use Modules\Narapidana\Requests\Update;
use Modules\Narapidana\Tables\NarapidanaTableView;

class NarapidanaController extends Controller
{
    public function index()
    {
        return NarapidanaTableView::make()->view('narapidana::index');
    }

    public function create()
    {
        return view('narapidana::create');
    }

    public function store(Store $request)
    {
        Narapidana::create($request->validated());

        return redirect()->back()->withSuccess('Narapidana saved');
    }

    public function show(Narapidana $narapidana)
    {
        return view('narapidana::show', compact('narapidana'));
    }

    public function edit(Narapidana $narapidana)
    {
        return view('narapidana::edit', compact('narapidana'));
    }

    public function update(Update $request, Narapidana $narapidana)
    {
        $narapidana->update($request->validated());

        return redirect()->back()->withSuccess('Narapidana saved');
    }

    public function destroy(Narapidana $narapidana)
    {
        $narapidana->delete();

        return redirect()->back()->withSuccess('Narapidana deleted');
    }
}
