	{!! form()->text('nama')->label('Nama Lengkap') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->number('no_telp')->label('No. Telepon') !!}
	{!! form()->uploader('foto')->extensions(['jpg', 'png'])->label('Foto') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::sipir.index'))
]) !!}
