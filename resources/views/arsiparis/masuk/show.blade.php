@extends('arsiparis.default')

@section('page-header')
    Detail<small> Surat Masuk </small>
@endsection

@section('content')

    <div class="col-md-9">
    <div class="card shadow mb-4">
        {!! Form::model($item, [
          'route' => [ ARSIPARIS. '.masuk.update',$item->id ],
          'method' => 'put',
          'files' => true
        ])
      !!}
      
      <input type="hidden" name="id_users" value="{{ Auth::user()->id}}">
      <input type="hidden" name="status_surat" value="{{ 1 }}">
      <input type="hidden" name="jenis_surat" value="Surat Masuk">
      <input type="hidden" name="id_surat" value="{{ $item->id }}">

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
              <input id="no_surat" type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" autocomplete="no_surat" value="{{ $item->no_surat }}" disabled>
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
              <input id="perihal_surat" type="text" class="form-control @error('perihal_surat') is-invalid @enderror" name="perihal_surat" autocomplete="perihal_surat" value="{{ $item->perihal_surat }}" disabled>
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
            <div class="form-group col-md-12">
              <label for="disposisi">Tindakan Disposisi</label>
              <div class="input-group mb-3">
              @if($item->disposisi == null)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Belum Di proses" }}" disabled>
              @else
                @if($item->disposisi == 1)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Ikuti Prosedur Menteri" }}" disabled>
                @elseif($item->disposisi == 2)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Proses Sesuai Prosedur" }}" disabled>
                @elseif($item->disposisi == 3)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Selesaikan" }}" disabled>
                @elseif($item->disposisi == 4)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Tanggapan/Saran Tertulis" }}" disabled>
                @elseif($item->disposisi == 5)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Pelajari" }}" disabled>
                @elseif($item->disposisi == 6)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Untuk Pertimbangan" }}" disabled>
                @elseif($item->disposisi == 7)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Perbaiki" }}" disabled>
                @elseif($item->disposisi == 8)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Siapkan dan Buatkan Konsep/Bahan" }}" disabled>
                @elseif($item->disposisi == 9)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Buatkan Undangan" }}" disabled>
                @elseif($item->disposisi == 10)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Untuk digunakan/ ditindaklanjuti" }}" disabled>
                @elseif($item->disposisi == 11)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Tangani Bersama" }}" disabled>
                @elseif($item->disposisi == 12)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Hadiri/ Wakili" }}" disabled>
                @elseif($item->disposisi == 13)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Untuk Diketahui/ Diperhatikan" }}" disabled>
                @elseif($item->disposisi == 14)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Chechk Status/ Perkembangan" }}" disabled>
                @elseif($item->disposisi == 15)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Laporkan" }}" disabled>
                @elseif($item->disposisi == 16)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Dibantu" }}" disabled>
                @elseif($item->disposisi == 17)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Dapat Disetujui" }}" disabled>
                @elseif($item->disposisi == 18)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Temui Saya" }}" disabled>
                @elseif($item->disposisi == 19)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Adakan Rapat" }}" disabled>
                @elseif($item->disposisi == 20)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Koordinasikan" }}" disabled>
                @elseif($item->disposisi == 21)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Jadwalkan/ Ingatkan" }}" disabled>
                @elseif($item->disposisi == 22)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Kirimkan Segera" }}" disabled>
                @elseif($item->disposisi == 23)
                <input id="disposisi" type="text" class="form-control @error('disposisi') is-invalid @enderror" name="disposisi" autocomplete="disposisi" value="{{ "Fotokopi / Arsipkan" }}" disabled>
                @endif
              @endif
              </div>
              <small id="disposisi" class="form-text text-muted">Tujuan di Disposisi</small>
              @error('disposisi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="tanggal_surat">Tanggal Surat Terlampir</label>
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

          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="tanggal_surat_masuk">Tanggal Surat Masuk di Institusi</label>
              <div class="input-group mb-3">
              <input id="tanggal_surat_masuk" type="text" class="form-control @error('tanggal_surat_masuk') is-invalid @enderror datetimepicker1" name="tanggal_surat_masuk" autocomplete="tanggal_surat_masuk" value="{{ $item->tanggal_surat_masuk }}" disabled>
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
              <label for="prodi">Disposisi Tujuan Surat( yang diisi oleh pengirim surat dan telah disetujui pimpinan )</label>
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
          
          <div class="formgroup row pl-3">
            <div class="form-group col-md-6">    
              <label for="disposisi2">Disposisi Surat Untuk Pihak ke2</label>
              <div class="input-group mb-3">
              <input id="disposisi2" type="text" class="form-control @error('disposisi2') is-invalid @enderror" name="disposisi2" autocomplete="disposisi2" value="{{ $item->disposisi2 }}">
              </div>
              @error('disposisi2')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <small id="disposisi2" class="form-text text-muted">Dapat dikosongkan jika tidak ada</small>
            </div>
            <div class="form-group col-md-6">    
              <label for="disposisi3">Disposisi Surat Untuk Pihak ke 3</label>
              <div class="input-group mb-3">
              <input id="disposisi3" type="text" class="form-control @error('disposisi3') is-invalid @enderror" name="disposisi3" autocomplete="disposisi3" value="{{ $item->disposisi3 }}">
              </div>
              @error('disposisi3')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <small id="disposisi3" class="form-text text-muted">Dapat dikosongkan jika tidak ada</small>
            </div>
  
          </div>



          <div class="form-group">
            <div class="form-group col-md-8">
              <label for="pengirim">Pengirim</label>
              <div class="input-group mb-3">
              <input id="pengirim" type="text" class="form-control @error('pengirim') is-invalid @enderror" name="pengirim" autocomplete="pengirim" value="{{ $item->pengirim }}" disabled>
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
              <label for="file_surat">Upload Surat</label>
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