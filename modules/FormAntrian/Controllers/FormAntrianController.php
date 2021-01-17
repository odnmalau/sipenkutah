<?php

namespace Modules\FormAntrian\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FormAntrian\Requests\Store;
use Modules\FormAntrian\Requests\Update;
use Modules\FormAntrian\Models\FormAntrian;
use Modules\FormAntrian\Tables\FormAntrianTableView;
use Modules\Narapidana\Models\Narapidana;

class FormAntrianController extends Controller
{
    public function index()
    {
        return FormAntrianTableView::make()->view('form-antrian::index');
    }

    public function create()
    {
        return view('form-antrian::create', [
            'formAntrian' => new FormAntrian(),
            'narapidana' => Narapidana::get(),
        ]);
    }

    public function store(Store $request)
    {
        $attr = $request->validated();

        $total_pengikut = $this->calcPengikut($request);

        $no = FormAntrian::count();

        $attr['no_antrian'] = date('dmY') . ++$no;
        $attr['total_pengikut'] = $total_pengikut;
        $attr['user_id'] = auth()->id();
        $attr['id_napi'] = request('id_napi');

        FormAntrian::create($attr);

        return redirect()->back()->withSuccess('FormAntrian saved');
    }

    public function show(FormAntrian $formAntrian)
    {
        return view('form-antrian::show', compact('formAntrian'));
    }

    public function edit(FormAntrian $formAntrian)
    {
        return view('form-antrian::create', [
            'formAntrian' => $formAntrian,
            'narapidana' => Narapidana::get(),
        ]);
    }

    public function update(Update $request, FormAntrian $formAntrian)
    {
        $attr = $request->validated();

        $total_pengikut = $this->calcPengikut($request);
        $attr['total_pengikut'] = $total_pengikut;

        $formAntrian->update($attr);

        return redirect()->back()->withSuccess('FormAntrian saved');
    }

    public function destroy(FormAntrian $formAntrian)
    {
        $formAntrian->delete();

        return redirect()->back()->withSuccess('FormAntrian deleted');
    }

    protected function calcPengikut(Store $request)
    {
        $laki = $request->input('laki-laki');
        $perempuan = $request->input('perempuan');
        $anak = $request->input('anak-anak');
        return $laki + $perempuan + $anak;
    }

    public function statusChanges(Request $request)
    {
        $user = FormAntrian::findOrFail($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'Status berhasil diperbarui.']);
    }
}
