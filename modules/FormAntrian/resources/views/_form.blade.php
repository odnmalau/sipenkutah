	{!! form()->text('no_antrian')->label('No Antrian') !!}
	{!! form()->text('user_id')->label('User Id') !!}
	{!! form()->datepicker('tgl_kunjungan')->label('Tgl Kunjungan') !!}
	{!! form()->text('laki-laki')->label('Laki-Laki') !!}
	{!! form()->text('perempuan')->label('Perempuan') !!}
	{!! form()->text('anak-anak')->label('Anak-Anak') !!}
	{!! form()->text('total_pengikut')->label('Total Pengikut') !!}
	{!! form()->text('jenis_barang')->label('Jenis Barang') !!}
	{!! form()->text('jumlah')->label('Jumlah') !!}
	{!! form()->text('keterangan')->label('Keterangan') !!}
	{!! form()->text('id_napi')->label('Id Napi') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::form-antrian.index'))
]) !!}
