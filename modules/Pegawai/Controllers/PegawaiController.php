<?php

namespace Modules\Pegawai\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Pegawai\Models\Pegawai;
use Modules\Pegawai\Requests\Store;
use Modules\Pegawai\Requests\Update;
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
        $attr = $request->validated();

        $foto = request()->file('foto');
        if ($foto) {
            $fileName = time().'_'.$foto->getClientOriginalName();
            $pathToFile = $foto->storeAs('pegawai', $fileName, 'public');
        } else {
            $pathToFile = null;
        }

        $attr['foto'] = $pathToFile;

        if ($pegawai = Pegawai::create($attr)) {
            $user = User::create([
                'name' => $pegawai['nama'],
                'email' => str_replace(' ', '', strtolower($pegawai->nama).'.pegawai@spkt.com'),
                'status' => 'ACTIVE',
                'timezone' => 'Asia/Jakarta',
                'password' => bcrypt($pegawai['no_telp']),
            ]);
            $user->assignRole('Pegawai');
        }

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
        $attr = $request->validated();

        $foto = request()->file('foto');
        if ($foto) {
            Storage::disk('public')->delete($pegawai->foto);
            $fileName = time().'_'.$foto->getClientOriginalName();
            $pathToFile = $foto->storeAs('pegawai', $fileName, 'public');
        } else {
            $pathToFile = $pegawai->foto;
        }

        $attr['foto'] = $pathToFile;

        $pegawai->update($attr);

        return redirect()->back()->withSuccess('Pegawai saved');
    }

    public function destroy(Pegawai $pegawai)
    {
        Storage::disk('public')->delete($pegawai->foto);
        $pegawai->delete();

        return redirect()->back()->withSuccess('Pegawai deleted');
    }
}
