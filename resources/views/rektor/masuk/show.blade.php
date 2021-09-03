@extends('rektor.default')

@section('page-header')
    Lihat<small> Surat Masuk </small>
@endsection

@section('content')

    <div class="col-md-9">
    <div class="card shadow mb-4">
      @if($item->status_surat == 2)
        {!! Form::model($item, [
          'route' => [ REKTOR. '.masuk.update',$item->id ],
          'method' => 'put',
          'files' => true
        ])
      !!}
      @endif
      
      <input type="hidden" name="status_surat" value="{{ 3 }}">

      <!-- Card Header - Accordion -->
      <a href="#axe3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="axe3">
        <h6 class="m-0 font-weight-bold text-info">Data Surat Masuk</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="axe3">
        <div class="card-body">

           <div class="form-group">
            <div class="form-group col-md-12">
              <label for="nomor_surat">No Surat</label>
              <div class="input-group mb-3">
              <input id="nomor_surat" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" autocomplete="nomor_surat" value="{{ $item->no_surat }}" readonly>
              </div>
              <small id="nomor_surat" class="form-text text-muted">Contoh : UNIBA/SK/0112/08/2021</small>
              @error('nomor_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="perihal_surat">Perihal Surat</label>
              <div class="input-group mb-3">
              <input id="perihal_surat" type="text" class="form-control @error('perihal_surat') is-invalid @enderror" name="perihal_surat" autocomplete="perihal_surat" value="{{ $item->perihal_surat }}" readonly>
              </div>
              <small id="perihal_surat" class="form-text text-muted">Contoh : Undangan Seminar Nasional</small>
              @error('perihal_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="tanggal_surat">Tanggal Surat</label>
              <div class="input-group mb-3">
              <input id="tanggal_surat" type="text" class="form-control @error('tanggal_surat') is-invalid @enderror datetimepicker1" name="tanggal_surat" autocomplete="tanggal_surat" value="{{ $item->tanggal_surat }}" disabled>
              </div>
              @error('tanggal_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          @if($item->status_surat == 2)
          <div class="form-group row pl-3">
            <div class="form-group col-md-4">
             <label for="tujuan_surat">Tujuan Disposisi</label>
              <div class="input-group mb-3">
              <select id="tujuan_surat" type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" name="tujuan_surat" value="{{ old('tujuan_surat') }}" autocomplete="tujuan_surat">
                <option value="" readonly>Silahkan memilih tujuan disposisi</option>
                @foreach($user as $user)
                  @if($user->role == 4)
                    <option value="{{$user->id}}">{{$user->unit_kerja->jabatan}} - {{$user->unit_kerja->unit}}</option>
                  @elseif($user->role == 7)
                    <option value="{{$user->id}}">{{$user->wakil_rektor->jabatan}}</option>
                  @elseif($user->role == 8)
                    <option value="{{$user->id}}">Rektor</option>
                  @endif
                @endforeach
              </select>
              </div>
              @error('tujuan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="prodi">Tujuan Surat( yang diisi oleh pengirim surat )</label>
              <div class="input-group mb-3">
              @if($item->tujuan_surat == null)
                <input type="text" class="form-control" value="Belum Pasti" disabled>
              @else
                @if($item->user->role == 4)
                  <input type="text" class="form-control" value="{{ $item->user->unit_kerja->jabatan }} - {{ $item->user->unit_kerja->unit }}" disabled>
                @elseif($item->user->role == 7)
                  <input type="text" class="form-control" value="{{ $item->user->wakil_rektor->jabatan}}" disabled>
                @elseif($item->user->role == 8)
                  <input type="text" class="form-control" value="Rektor" disabled>
                @endif
              @endif
              </div>
              @error('tujuan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          @endif

          @if($item->status_surat == 2)
          <div class="form-group">
            <div class="form-group col-md-8">
              {!! Form::mySelect('disposisi', 'Peruntukkan Disposisi', config('variables.disposisi'), ['class' => 'form-control select2']) !!}
              @error('disposisi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          @else
          <div class="form-group">
            <div class="form-group col-md-8">
              {!! Form::mySelect('disposisi', 'Peruntukkan Disposisi', config('variables.disposisi'), $item->disposisi, ['class' => 'form-control select2', 'disabled']) !!}
              @error('disposisi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          @endif


          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="pengirim_surat">Pengirim</label>
              <div class="input-group mb-3">
              <input id="pengirim_surat" type="text" class="form-control @error('pengirim_surat') is-invalid @enderror" name="pengirim_surat" autocomplete="pengirim_surat" value="{{ $item->pengirim }}" readonly>
              </div>
              <small id="pengirim_surat" class="form-text text-muted">Contoh : Universitas Balikpapan</small>
              @error('pengirim_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="file_surat">Úpload Surat</label>
              <div class="input-group mb-3">
              <input id="file_surat" type="file" class="form-control @error('file_surat') is-invalid @enderror" name="file_surat" autocomplete="file_surat" disabled>
              @isset($item->file_surat)
              <div class="input-group-append">
                <a href="{{url('storage/surat_masuk/'.$item->file_surat )}}"class="btn btn-success" download>Download</a>
              </div>
              @endisset
              </div>
              <small id="file_surat" class="form-text text-muted">File scan surat masuk</small>
              <small id="file_surat" class="form-text text-muted">hanya file pdf, max 2 Mb </small>
              @error('file_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          @if($item->status_surat == 2)
          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="keterangan_surat">Keterangan</label>
              <div class="input-group mb-3">
              <input id="keterangan_surat" type="text" class="form-control @error('keterangan_surat') is-invalid @enderror" name="keterangan_surat" autocomplete="keterangan_surat" value="{{ $item->keterangan_surat }}">
              </div>
              <small id="keterangan_surat" class="form-text text-muted">Contoh : Surat penting, segera diproses</small>
              @error('keterangan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          @else
          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="keterangan_surat">Keterangan</label>
              <div class="input-group mb-3">
              <input id="keterangan_surat" type="text" class="form-control @error('keterangan_surat') is-invalid @enderror" name="keterangan_surat" autocomplete="keterangan_surat" value="{{ $item->keterangan_surat }}" disabled>
              </div>
              <small id="keterangan_surat" class="form-text text-muted">Contoh : Surat penting, segera diproses</small>
              @error('keterangan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          @endif

          @if($item->status_surat == 2)
          <div class="form-group row mb-0">
          <div class="col-md-1 align-self-end ml-auto">
              <button type="submit"class="btn btn-lg btn-info pull-right" style="float: right;">
                  {{ __('DISPOSISI') }}
              </button>
          </div>
          </div>
          </div>
          {!! Form::close() !!}
          @endif

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