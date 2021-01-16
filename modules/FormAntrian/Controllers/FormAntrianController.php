<?php

namespace Modules\FormAntrian\Controllers;

use Illuminate\Routing\Controller;
use Modules\FormAntrian\Requests\Store;
use Modules\FormAntrian\Requests\Update;
use Modules\FormAntrian\Models\FormAntrian;
use Modules\FormAntrian\Tables\FormAntrianTableView;

class FormAntrianController extends Controller
{
    public function index()
    {
        return FormAntrianTableView::make()->view('form-antrian::index');
    }

    public function create()
    {
        return view('form-antrian::create');
    }

    public function store(Store $request)
    {
        FormAntrian::create($request->validated());

        return redirect()->back()->withSuccess('FormAntrian saved');
    }

    public function show(FormAntrian $formAntrian)
    {
        return view('form-antrian::show', compact('formAntrian'));
    }

    public function edit(FormAntrian $formAntrian)
    {
        return view('form-antrian::edit', compact('formAntrian'));
    }

    public function update(Update $request, FormAntrian $formAntrian)
    {
        $formAntrian->update($request->validated());

        return redirect()->back()->withSuccess('FormAntrian saved');
    }

    public function destroy(FormAntrian $formAntrian)
    {
        $formAntrian->delete();

        return redirect()->back()->withSuccess('FormAntrian deleted');
    }
}
