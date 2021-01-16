	{!! form()->text('nip')->label('Nip') !!}
	{!! form()->text('nama')->label('Nama') !!}
	{!! form()->text('golongan')->label('Golongan') !!}
	{!! form()->text('jabatan')->label('Jabatan') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->text('no_telp')->label('No Telp') !!}
	{!! form()->text('foto')->label('Foto') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::pegawai.index'))
]) !!}
