	{!! form()->text('no_identitas')->label('No. Identitas') !!}
	{!! form()->file('upload_identitas')->label('Upload Identitas') !!}
	{!! form()->text('nama_lengkap')->label('Nama Lengkap') !!}
	{!! form()->email('email')->label('Email Address') !!}
	{!! form()->select('jenis_kelamin', [0 => 'Laki-laki', 1 => "Perempuan"])->label('Jenis Kelamin') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->number('no_hp')->label('No. Telepon') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::pengunjung.index'))
]) !!}
