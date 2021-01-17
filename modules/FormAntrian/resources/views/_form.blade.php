	{!! form()->hidden('no_antrian') !!}
	{!! form()->datepicker('tgl_kunjungan')->label('Tanggal Kunjungan') !!}
	<div class="field"><label>Waktu</label><select class="ui dropdown search clearable selection" name="waktu">
		<option value="Sesi Pagi - 09:00 s/d 11:00 WIB">Sesi Pagi - 09:00 s/d 11:00 WIB</option>
		<option value="Sesi Siang - 13:00 s/d 14:30 WIB">Sesi Siang - 13:00 s/d 14:30 WIB</option>
	</select></div>
	<h4 class="ui dividing header centered">Pengikut</h4>
	<div class="field">
		<label>Laki-Laki</label>
		<input type="number" name="laki-laki" value="{{ old('perempuan') ?? $formAntrian->{'laki-laki'} }}">
		<div class="ui basic label">
			Orang
		</div>
	</div>
	<div class="field">
		<label>Perempuan</label>
		<input type="number" name="perempuan" value="{{ old('perempuan') ?? $formAntrian->perempuan }}">
		<div class="ui basic label">
			Orang
		</div>
	</div>
	<div class="field">
		<label>Anak-Anak</label>
		<input type="number" name="anak-anak" value="{{ old('anak-anak') ?? $formAntrian->{'anak-anak'} }}">
		<div class="field ui basic label">
			Orang
		</div>
	</div>
	{!! form()->hidden('total_pengikut') !!}
	<h4 class="ui dividing header centered">Barang yang Dititipkan</h4>
	<div class="field">
		<label>Jenis Barang</label>
		<input type="text" name="jenis_barang" value="{{ old('jenis_barang') ?? $formAntrian->{'jenis_barang'} }}">
	</div>
	<div class="field">
		<label>Jumlah</label>
		<input type="number" name="jumlah" value="{{ old('jumlah') ?? $formAntrian->{'jumlah'} }}">
	</div>
	<div class="field">
		<label>Keterangan</label>
		<textarea name="keterangan" rows="10" cols="50">{{ old('keterangan') ?? $formAntrian->{'keterangan'} }}</textarea>
	</div>
	<h4 class="ui dividing header centered"></h4>
	<div class="field">
		<label>Nama Napi</label>
		<select class="ui dropdown search clearable selection" name="napi">
			@foreach ($narapidana as $napi)
				<option {{ $napi->id == $formAntrian->napi_id ? 'selected' : '' }} value="{{ $napi->id }}">{{ $napi->nama_lengkap }}</option>
			@endforeach
		</select>
	</div>
	@if (auth()->user()->hasRole(['Sipir', 'Administrator']))
		<div class="field"><label>Status</label><select class="ui dropdown search clearable selection" name="status">
			<option value="Ditolak">Ditolak</option>
			<option value="Diterima">Diterima</option>
		</select></div>
	@endif
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::form-antrian.index'))
]) !!}
