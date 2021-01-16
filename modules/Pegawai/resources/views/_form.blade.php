	{!! form()->number('nip')->label('NIP') !!}
	{!! form()->text('nama')->label('Nama Lengkap') !!}
	{!! form()->text('golongan')->label('Golongan') !!}
	{!! form()->text('jabatan')->label('Jabatan') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->number('no_telp')->label('No. Telepon') !!}
	{!! form()->file('foto')->label('Foto') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::pegawai.index'))
]) !!}
