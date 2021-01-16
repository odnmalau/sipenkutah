	{!! form()->text('nama')->label('Nama Lengkap') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->number('no_telp')->label('No. Telepon') !!}
	{!! form()->file('foto')->label('Foto') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::sipir.index'))
]) !!}
