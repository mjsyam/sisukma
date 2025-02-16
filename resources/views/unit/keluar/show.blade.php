@extends('unit.default')

@section('page-header')
    Lihat<small> Surat Keluar </small>
@endsection

@section('content')

    <div class="col-md-9">
    <div class="card shadow mb-4">
      {!! Form::model($item, [
          'route' => [ UNIT. '.keluar.update',$item->id ],
          'method' => 'put',
          'files' => true
        ])
      !!}

      <!-- Card Header - Accordion -->
      <a href="#axe3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="axe3">
        <h6 class="m-0 font-weight-bold text-info">Data Surat Keluar</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="axe3">
        <div class="card-body">

          <input type="hidden" name="status_surat" value="{{ 4 }}">

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="nomor_surat">No Surat</label>
              <div class="input-group mb-3">
              <input id="nomor_surat" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" autocomplete="nomor_surat" value="{{ $item->no_surat }}" required>
              </div>
              <small id="nomor_surat" class="form-text text-muted">Contoh : JMTI/SK/0112/08/2021</small>
              @error('nomor_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              {!! Form::mySelect('jenis_tata_naskah', 'Jenis Tata Naskah', config('variables.jenis_tata_naskah'), $item->jenis_tata_naskah, ['class' => 'form-control select2', 'required']) !!}
              @error('ck_surat_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="keperluan_surat">Keperluan Surat</label>
              <div class="input-group mb-3">
              <input id="keperluan_surat" type="text" class="form-control @error('keperluan_surat') is-invalid @enderror" name="keperluan_surat" autocomplete="keperluan_surat" value="{{ $item->keperluan_surat }}" required>
              </div>
              <small id="keperluan_surat" class="form-text text-muted">Contoh : Undangan Seminar Nasional</small>
              @error('keperluan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="tujuan_surat">Tujuan Surat</label>
              <div class="input-group mb-3">
              <input id="tujuan_surat" type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" name="tujuan_surat" autocomplete="tujuan_surat" value="{{ $item->tujuan_surat }}" required>
              </div>
              <small id="tujuan_surat" class="form-text text-muted">Contoh : Pemerintahan Kota Balikpapan</small>
              @error('tujuan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="pejabat_penandatangan">Pejabat Penandatangan</label>
              <div class="input-group mb-3">
              <select id="pejabat_penandatangan" type="text" class="form-control @error('pejabat_penandatangan') is-invalid @enderror" name="pejabat_penandatangan" value="{{ old('pejabat_penandatangan') }}" autocomplete="pejabat_penandatangan" required>
                <option value="" disabled>Silahkan memilih pejabat penandatangan</option>
                @foreach($user as $user)
                  @if($user->role == 7)
                    <option value="{{$user->id}}" {{ $item->pejabat_penandatangan == $user->id ? 'selected' : '' }}>{{$user->wakil_rektor->jabatan}}</option>
                  @elseif($user->role == 8)
                    <option value="{{$user->id}}" {{ $item->pejabat_penandatangan == $user->id ? 'selected' : '' }}>Rektor</option>
                  @endif
                @endforeach
              </select>
              </div>
              @error('pejabat_penandatangan')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="file_surat">Upload Surat</label>
              <div class="input-group mb-3">
              <input id="file_surat" type="file" class="form-control @error('file_surat') is-invalid @enderror" name="file_surat" autocomplete="file_surat" required>
              @isset($item->file_surat)
              <div class="input-group-append">
                <a href="{{url('storage/surat_keluar/'.$item->file_surat )}}"class="btn btn-info" target="_blank">Lihat File</a>
              </div>
              @endisset
              </div>
              <small id="file_surat" class="form-text text-muted">File scan surat keluar</small>
              <small id="file_surat" class="form-text text-muted">hanya file pdf, max 2 Mb </small>
              @error('file_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="keterangan_surat">Keterangan Surat (catatan dari sekretariat)</label>
              <div class="input-group mb-3">
              <input id="keterangan_surat" type="text" class="form-control @error('keterangan_surat') is-invalid @enderror" name="keterangan_surat" autocomplete="keterangan_surat" value="{{ $item->keterangan_surat }}" required>
              </div>
              <small id="keterangan_surat" class="form-text text-muted">Contoh : Penting</small>
              @error('keterangan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-0 pr-3">
          <div class="col-md-1 align-self-end ml-auto">
              <button type="submit"class="btn btn-lg btn-info pull-right" style="float: right;">
                  {{ __('REVISI') }}
              </button>
          </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script type="text/javascript">
jQuery.datetimepicker.setLocale('id');

jQuery('.datetimepicker1').datetimepicker({
 i18n:{
  id:{
   months:[
    'Januari','Februari','Maret','April',
    'Mei','Juni','Juli','Agustus',
    'September','Oktober','November','Desember',
   ],
   dayOfWeek:[
    "Minggu", "Senin", "Selasa", "Rabu", 
    "Kamis", "Jum'at", "Sabtu",
   ]
  }
 },
 timepicker:false,
 format:'d/m/Y'
});
</script>
@endsection