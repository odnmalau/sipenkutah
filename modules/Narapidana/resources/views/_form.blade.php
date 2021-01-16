	{!! form()->select('kewarganegaraan', [0 => 'WNI', 1 => "WNA"])->label('Kewarganegaraan') !!}
	{!! form()->text('no_identitas')->label('Nomor Identitas') !!}
	{!! form()->text('nama_lengkap')->label('Nama Lengkap') !!}
	{!! form()->textarea('alamat')->label('Alamat') !!}
	{!! form()->datepicker('tgl_lahir')->label('Tgl Lahir') !!}
	{!! form()->text('perkara')->label('Perkara') !!}
	{!! form()->datepicker('tgl_masuk')->label('Tanggal Masuk') !!}
	{!! form()->text('blok')->label('Blok/Kamar') !!}
	<h4 class="ui dividing header centered">Masa Pidana</h4>
	{!! form()->text('tahun')->label('Tahun') !!}
	{!! form()->text('bulan')->label('Bulan') !!}
	{!! form()->text('hari')->label('Hari') !!}
	{!! form()->select('lama_pidana', [0 => 'Hukuman Mati', 1 => 'Seumur Hidup'])->placeholder('--Pilih--')->label('Lama Pidana') !!}
{!! form()->action([
	form()->submit('Simpan'),
	form()->link('Batal', route('modules::narapidana.index'))
]) !!}