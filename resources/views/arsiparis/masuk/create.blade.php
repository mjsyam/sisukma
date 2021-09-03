@extends('arsiparis.default')

@section('page-header')
    Buat<small> Surat Masuk </small>
@endsection

@section('content')

    <div class="col-md-9">
    <div class="card shadow mb-4">
        {!! Form::open([
          'route' => [ ARSIPARIS. '.masuk.store' ],
          'files' => true
        ])
      !!}
      
      <input type="hidden" name="id_users" value="{{ Auth::user()->id}}">
      <input type="hidden" name="status_surat" value="{{ 1 }}">

      <!-- Card Header - Accordion -->
      <a href="#axe3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="axe3">
        <h6 class="m-0 font-weight-bold text-info">Data Surat Masuk</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="axe3">
        <div class="card-body">

          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="no_surat">No Surat</label>
              <div class="input-group mb-3">
              <input id="no_surat" type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" autocomplete="no_surat" value="{{ old('no_surat') }}" required>
              </div>
              <small id="no_surat" class="form-text text-muted">Contoh : UNIBA/SK/0112/08/2021</small>
              @error('no_surat')
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
              <input id="perihal_surat" type="text" class="form-control @error('perihal_surat') is-invalid @enderror" name="perihal_surat" autocomplete="perihal_surat" value="{{ old('perihal_surat') }}" required>
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
              <input id="tanggal_surat" type="text" class="form-control @error('tanggal_surat') is-invalid @enderror datetimepicker1" name="tanggal_surat" autocomplete="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
              </div>
              @error('tanggal_surat')
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
              <select id="tujuan_surat" type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" name="tujuan_surat" value="{{ old('tujuan_surat') }}" autocomplete="tujuan_surat">
                <option value="" >Belum pasti</option>
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
              <small id="perihal_surat" class="form-text text-muted">Dapat memilih "belum pasti", jika tujuan surat belum pasti</small>
              @error('tujuan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="pengirim">Pengirim</label>
              <div class="input-group mb-3">
              <input id="pengirim" type="text" class="form-control @error('pengirim') is-invalid @enderror" name="pengirim" autocomplete="pengirim" value="{{ old('pengirim') }}" required>
              </div>
              <small id="pengirim" class="form-text text-muted">Contoh : Universitas Balikpapan</small>
              @error('pengirim')
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
              <input id="file_surat" type="file" class="form-control @error('file_surat') is-invalid @enderror" name="file_surat" autocomplete="file_surat" required>
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

          <div class="form-group">
            <div class="form-group col-md-12">
              <label for="keterangan_surat">Keterangan</label>
              <div class="input-group mb-3">
              <input id="keterangan_surat" type="text" class="form-control @error('keterangan_surat') is-invalid @enderror" name="keterangan_surat" autocomplete="keterangan_surat" value="{{ old('keterangan_surat') }}">
              </div>
              <small id="keterangan_surat" class="form-text text-muted">Contoh : Surat penting, segera diproses (dapat dikosongkan)</small>
              @error('keterangan_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-0 pr-3">
          <div class="col-md-1 align-self-end ml-auto">
              <button type="button" class="btn btn-lg btn-info pull-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Simpan</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukan Data Buku Agenda</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">No Agenda:</label>
                        @if($no !== null)
                        <?php $x = (int)$no->no_agenda; $x = $x+1; ?>
                        <input class="form-control" name="no_agenda" id="message-text" value="{{ $x }}">
                        <small id="no_agenda" class="form-text text-muted">No Agenda Surat Masuk Terakhir : {{$no->no_agenda}}</small>
                        @else
                        <input class="form-control" name="no_agenda" id="message-text" value="{{ 1 }}">
                        <small id="no_agenda" class="form-text text-muted">No Agenda Surat Masuk Terakhir : 0</small>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Ringkasan Isi:</label>
                        <textarea class="form-control" name="ringkasan_isi" id="message-text"></textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Buat Data Agenda</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>  
          </div>
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