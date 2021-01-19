<?php

namespace Modules\FormAntrian\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Laravolt\Suitable\Builder;
use Modules\FormAntrian\Mail\ConfirmationRejected;
use Modules\FormAntrian\Mail\ConfirmationSuccess;
use Modules\FormAntrian\Models\FormAntrian;
use Modules\FormAntrian\Requests\Store;
use Modules\FormAntrian\Requests\Update;
use Modules\FormAntrian\Tables\FormAntrianTableView;
use Modules\FormAntrian\Tables\HistoryTableView;
use Modules\Narapidana\Models\Narapidana;
use PDF;

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

        $attr['no_antrian'] = date('dmY').++$no;
        $attr['total_pengikut'] = $total_pengikut;
        $attr['user_id'] = auth()->id();
        $attr['id_napi'] = request('id_napi');

        FormAntrian::create($attr);

        if (auth()->user()->hasRole(['Pengunjung'])) {
            return redirect()->back()->withSuccess('Kamu akan mendapatkan email dari petugas, jika pendaftaran kamu berhasil.');
        }

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
        $formAntrian = FormAntrian::findOrFail($request->id);
        $formAntrian->status = $request->status;
        $formAntrian->updated_by = auth()->id();

        if ($formAntrian->update()) {
            $pass = [
                'nama_pengunjung' => $formAntrian->pengunjung->name,
                'nama_napi' => $formAntrian->napi->nama_lengkap,
                'tgl_kunjungan' => $formAntrian->tgl_kunjungan,
                'waktu' => $formAntrian->waktu,
                'no_antrian' => $formAntrian->no_antrian,
            ];

            Mail::to($formAntrian->pengunjung->email)->send(new ConfirmationSuccess($pass));

            return response()->json(['message' => 'Status berhasil diperbarui dan pengunjung sudah mendapatkan email.']);
        }

        return response()->json(['message' => 'Status berhasil diperbarui dan pengunjung gagal mendapatkan email.']);
    }

    public function statusChangesReject(Request $request)
    {
        $formAntrian = FormAntrian::findOrFail($request->id);
        $formAntrian->status = $request->status;
        $formAntrian->updated_by = auth()->id();

        if ($formAntrian->update()) {
            $pass = [
                'nama_pengunjung' => $formAntrian->pengunjung->name,
                'nama_napi' => $formAntrian->napi->nama_lengkap,
                'tgl_kunjungan' => $formAntrian->tgl_kunjungan,
                'waktu' => $formAntrian->waktu,
                'no_antrian' => $formAntrian->no_antrian,
            ];

            Mail::to($formAntrian->pengunjung->email)->send(new ConfirmationRejected($pass));

            return response()->json(['message' => 'Status berhasil diperbarui dan pengunjung sudah mendapatkan email.']);
        }

        return response()->json(['message' => 'Status berhasil diperbarui dan pengunjung gagal mendapatkan email.']);
    }

    public function history()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ', request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d').' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d').' 23:59:59';
        }

        $report = FormAntrian::whereBetween('created_at', [$start, $end])->get();

        return HistoryTableView::make()
            ->decorate(function (Builder $table) {
                $table->getDefaultSegment()->appendLeft(view('form-antrian::components.filter-range')->render());
            })
            ->view('form-antrian::history', compact('report'));
    }

    public function historyReportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d').' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d').' 23:59:59';

        $report = FormAntrian::whereBetween('created_at', [$start, $end])
            ->get();

        $pdf = PDF::loadView('form-antrian::report-pdf', compact('report', 'date'));

        return $pdf->stream();
    }
}
