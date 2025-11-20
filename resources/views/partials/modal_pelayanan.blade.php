{{-- === Modal Tambah Pelayanan === --}}
<div class="modal fade" id="modalPelayanan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Data Pelayanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('pelayanan.store') }}">
        @csrf
        <div class="modal-body">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Nama Pasien</label>
              <input type="text" name="nama_pasien" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Tanggal Pelayanan</label>
              <input type="date" name="tanggal_pelayanan" class="form-control" required>
            </div>
<div class="col-md-6">
              <label class="form-label">Jenis Pelayanan</label>
              <input type="text" name="jenis_pelayanan" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Detail Pelayanan</label>
              <input type="text" name="program_kesehatan" class="form-control">
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

{{-- === Modal Edit Pelayanan === --}}
@foreach($pelayanan as $p)
<div class="modal fade" id="editPelayanan{{ $p->id_pelayanan }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Edit Data Pelayanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('pelayanan.update',$p->id_pelayanan) }}">
        @csrf @method('PUT')
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Pasien</label>
              <input type="text" name="nama_pasien" class="form-control" value="{{ $p->nama_pasien }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Pelayanan</label>
              <input type="date" name="tanggal_pelayanan" class="form-control" value="{{ $p->tanggal_pelayanan }}">
            </div>
                <div class="col-md-6">
              <label class="form-label">Jenis Pelayanan</label>
              <input type="text" name="jenis_pelayanan" class="form-control" value="{{ $p->jenis_pelayanan }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Detail Pelayanan</label>
              <input type="text" name="program_kesehatan" class="form-control" value="{{ $p->program_kesehatan }}">
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
@endforeach
