{{-- === Modal Tambah Anak === --}}
<div class="modal fade" id="modalAnak" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Data Anak</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="{{ route('anak.store') }}">
        @csrf

        <div class="modal-body">
          <div class="row g-3">

            {{-- Nama Anak --}}
            <div class="col-md-4">
              <label class="form-label">Nama Anak</label>
              <input type="text" name="nama_anak" class="form-control" required>
            </div>

            {{-- NIK --}}
            <div class="col-md-4">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" required>
            </div>

            {{-- Nama Orang Tua --}}
            <div class="col-md-4">
              <label class="form-label">Nama Orang Tua (Ibu)</label>
              <input type="text" name="nama_ortu" class="form-control" required>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="col-md-4">
              <label class="form-label">Tanggal Lahir Anak</label>
              <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            {{-- Usia --}}
            <div class="col-md-4">
              <label class="form-label">Usia (tahun)</label>
              <input type="number" name="usia_anak" class="form-control">
            </div>

            {{-- Jenis Kelamin --}}
            <div class="col-md-4">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin_anak" class="form-select">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            {{-- LIST IMUNISASI --}}
            @php
                $imunList = [
                    'hepatitis_b' => 'Hepatitis B',
                    'bcg' => 'BCG',
                    'polio' => 'Polio',
                    'dpt_hb_hib' => 'DPT-HB-HIB',
                    'pcv' => 'PCV',
                    'rota' => 'Rota Virus',
                    'campak_rubella' => 'Campak Rubella'
                ];
            @endphp

            <div class="col-12 mt-2">
              <label class="fw-bold">Daftar Imunisasi</label>

              @foreach($imunList as $key => $label)
    <div class="row align-items-center mb-2 imunisasi-row">

        {{-- Checkbox --}}
        <div class="col-md-6">
            <label>
                <input type="checkbox"
                       class="imunisasi-checkbox"
                       name="imunisasi_{{ $key }}"
                       value="ya"
                       @isset($a) {{ $a->{'imunisasi_'.$key} == 'ya' ? 'checked' : '' }} @endisset>
                {{ $label }}
            </label>
        </div>

        {{-- Input tanggal --}}
        <div class="col-md-6">
            <input type="date"
                   class="form-control imunisasi-date"
                   name="tanggal_{{ $key }}"
                   @isset($a) value="{{ $a->{'tanggal_'.$key} }}" @endisset>
        </div>

    </div>
@endforeach


            </div>

            {{-- Tinggi badan --}}
            <div class="col-md-4">
              <label class="form-label">Tinggi Badan (cm)</label>
              <input type="number" step="0.1" name="tinggi_badan" class="form-control">
            </div>

            {{-- Berat badan --}}
            <div class="col-md-4">
              <label class="form-label">Berat Badan (kg)</label>
              <input type="number" step="0.1" name="berat_badan" class="form-control">
            </div>

            {{-- Kesimpulan --}}
            <div class="col-md-4">
              <label class="form-label">Kesimpulan</label>
              <select name="kesimpulan" class="form-select">
                <option value="Gizi Baik">Gizi Baik</option>
                <option value="Gizi Kurang">Gizi Kurang</option>
                <option value="Gizi Buruk">Gizi Buruk</option>
                <option value="Stunting">Stunting</option>
              </select>
            </div>
            {{-- Nama Petugas --}}
            <div class="col-md-12">
              <label class="form-label">Nama Petugas</label>
              <input type="text" name="nama_petugas" class="form-control" required>
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
@foreach($anak as $a)
<div class="modal fade" id="editAnak{{ $a->id_anak }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Edit Data Anak</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="{{ route('anak.update', $a->id_anak) }}">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <div class="row g-3">

            {{-- Nama Anak --}}
            <div class="col-md-4">
              <label class="form-label">Nama Anak</label>
              <input type="text" name="nama_anak" class="form-control" value="{{ $a->nama_anak }}">
            </div>

            {{-- NIK --}}
            <div class="col-md-4">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" value="{{ $a->nik }}">
            </div>

            {{-- Nama Ibu --}}
            <div class="col-md-4">
              <label class="form-label">Nama Orang Tua (Ibu)</label>
              <input type="text" name="nama_ortu" class="form-control" value="{{ $a->nama_ortu }}">
            </div>

            {{-- Tanggal Lahir --}}
            <div class="col-md-4">
              <label class="form-label">Tanggal Lahir Anak</label>
              <input type="date" name="tanggal_lahir" class="form-control" value="{{ $a->tanggal_lahir }}">
            </div>

            {{-- Usia --}}
            <div class="col-md-4">
              <label class="form-label">Usia</label>
              <input type="number" name="usia_anak" class="form-control" value="{{ $a->usia_anak }}">
            </div>

            {{-- Jenis Kelamin --}}
            <div class="col-md-4">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin_anak" class="form-select">
                <option value="Laki-laki" {{ $a->jenis_kelamin_anak=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                <option value="Perempuan" {{ $a->jenis_kelamin_anak=='Perempuan'?'selected':'' }}>Perempuan</option>
              </select>
            </div>

            {{-- LIST IMUNISASI --}}
            <div class="col-12 mt-2">
              <label class="fw-bold">Daftar Imunisasi</label>

              @foreach($imunList as $key => $label)
    <div class="row align-items-center mb-2 imunisasi-row">

        {{-- Checkbox --}}
        <div class="col-md-6">
            <label>
                <input type="checkbox"
                       class="imunisasi-checkbox"
                       name="imunisasi_{{ $key }}"
                       value="ya"
                       @isset($a) {{ $a->{'imunisasi_'.$key} == 'ya' ? 'checked' : '' }} @endisset>
                {{ $label }}
            </label>
        </div>

        {{-- Input tanggal --}}
        <div class="col-md-6">
            <input type="date"
                   class="form-control imunisasi-date"
                   name="tanggal_{{ $key }}"
                   @isset($a) value="{{ $a->{'tanggal_'.$key} }}" @endisset>
        </div>

    </div>
@endforeach

            </div>

            {{-- Tinggi --}}
            <div class="col-md-4">
              <label>Tinggi (cm)</label>
              <input type="number" name="tinggi_badan" step="0.1" class="form-control" value="{{ $a->tinggi_badan }}">
            </div>

            {{-- Berat --}}
            <div class="col-md-4">
              <label>Berat (kg)</label>
              <input type="number" name="berat_badan" step="0.1" class="form-control" value="{{ $a->berat_badan }}">
            </div>

            {{-- Kesimpulan --}}
            <div class="col-md-4">
              <label>Kesimpulan</label>
              <select name="kesimpulan" class="form-select">
                <option value="Gizi Baik" {{ $a->kesimpulan=='Gizi Baik'?'selected':'' }}>Gizi Baik</option>
                <option value="Gizi Kurang" {{ $a->kesimpulan=='Gizi Kurang'?'selected':'' }}>Gizi Kurang</option>
                <option value="Gizi Buruk" {{ $a->kesimpulan=='Gizi Buruk'?'selected':'' }}>Gizi Buruk</option>
                <option value="Stunting" {{ $a->kesimpulan=='Stunting'?'selected':'' }}>Stunting</option>
              </select>
            </div>
             {{-- Nama Petugas --}}
            <div class="col-md-12">
              <label class="form-label">Nama Petugas</label>
              <input type="text" name="nama_petugas" class="form-control" value="{{ $a->nama_petugas }}">
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
<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".imunisasi-row").forEach(row => {

        const cb = row.querySelector(".imunisasi-checkbox");
        const dateInput = row.querySelector(".imunisasi-date");

        // Kondisi awal
        if (!cb.checked) {
            dateInput.disabled = true;
            dateInput.value = "";
        }

        // Saat checkbox berubah
        cb.addEventListener("change", () => {
            dateInput.disabled = !cb.checked;

            if (!cb.checked) {
                dateInput.value = "";
            }
        });
    });

});
</script>


