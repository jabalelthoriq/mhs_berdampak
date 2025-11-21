{{-- === Modal Tambah Orang Tua === --}}
<div class="modal fade" id="modalOrangtua" tabindex="-1" aria-labelledby="modalOrangtuaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Data Orang Tua</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('orangtua.store') }}">
        @csrf
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Orang Tua</label>
              <input type="text" name="nama_orangtua" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" maxlength="20" required>
            </div>

            <div class="col-md-4">
              <label class="form-label">Usia</label>
              <input type="number" name="usia_orangtua" class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin_orangtua" class="form-select">
                <option value="">--Pilih--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control">
            </div>

            <div class="col-md-12">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label">Riwayat Penyakit</label>
              <input type="text" name="riwayat_penyakit" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Jenis Penyakit</label>
            <select name="jenis_penyakit" class="form-select">
                <option value="">--Pilih--</option>
                <option value="menular">Menular</option>
                <option value="tidak menular">Tidak Menular</option>
              </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- === Modal Edit Orang Tua === --}}
@foreach($orangtua as $o)
<div class="modal fade" id="editOrangtua{{ $o->id_orangtua }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Edit Data Orang Tua</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('orangtua.update',$o->id_orangtua) }}">
        @csrf @method('PUT')
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Orang Tua</label>
              <input type="text" name="nama_orangtua" class="form-control" value="{{ $o->nama_orangtua }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" value="{{ $o->nik }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Usia</label>
              <input type="number" name="usia_orangtua" class="form-control" value="{{ $o->usia_orangtua }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin_orangtua" class="form-select">
                <option value="Laki-laki" {{ $o->jenis_kelamin_orangtua == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $o->jenis_kelamin_orangtua == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" value="{{ $o->pekerjaan }}">
            </div>
            <div class="col-md-12">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control">{{ $o->alamat }}</textarea>
            </div>
            <div class="col-md-12">
              <label class="form-label">Riwayat Penyakit</label>
              <input type="text" name="riwayat_penyakit" class="form-control" value="{{ $o->riwayat_penyakit }}">
            </div>
            <div class="col-md-12">
              <label class="form-label">Jenis Penyakit</label>
              <select name="jenis_penyakit" class="form-select">
                <option value="tidak ada" {{ $o->jenis_penyakit == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="menular" {{ $o->jenis_penyakit == 'menular' ? 'selected' : '' }}>Menular</option>
                <option value="tidak menular" {{ $o->jenis_penyakit == 'tidak menular' ? 'selected' : '' }}>Tidak Menular</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
