@extends('arsiparis.default')

@section('page-header')
    Surat Keluar <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')
    <div class="mB-20 pull-right">
        <a href="{{ route(ARSIPARIS . '.keluar.forward.all') }}" class="btn btn-success">
            Teruskan Semua
        </a>
    </div>

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Keperluan Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Pejabat Penandatangan</th>
                        <th>Unit Pengajuan</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Keperluan Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Pejabat Penandatangan</th>
                        <th>Unit Pengajuan</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $no = 0;?>
                    @foreach ($items as $item)
                    <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->keperluan_surat }}</td>
                            <td><?php $x = config('variables.jenis_tata_naskah');print_r($x[$item->jenis_tata_naskah]);?></td>
                            @if($item->pejabat->role == 7)
                                <td>{{$item->pejabat->wakil_rektor->jabatan}}</td>
                            @elseif($item->pejabat->role == 8)
                                <td>Rektor</td>
                            @endif
                            <td>{{ $item->user->unit_kerja->unit}}</td>
                            <td>
                                @if($item->status_surat == 0)
                                <mark style="background-color: black; color: white;">
                                            Pengajuan dari Unit
                                @elseif($item->status_surat == 1)
                                <mark style="background-color: blue; color: white;">
                                            Tahap Review
                                @elseif($item->status_surat == 2)
                                <mark style="background-color: red; color: white;">
                                            Ditolak Sekretariat
                                @elseif($item->status_surat == 3)
                                <mark style="background-color: yellow; color: black;">
                                            Perlu Direvisi
                                @elseif($item->status_surat == 4)
                                <mark style="background-color: white; color: black;">
                                            Direvisi
                                @elseif($item->status_surat == 5)
                                <mark style="background-color: blue; color: white;">
                                            Tahap Review Ulang
                                @elseif($item->status_surat == 6)
                                <mark style="background-color: green; color: white;">
                                            Lolos Review
                                @elseif($item->status_surat == 7)
                                <mark style="background-color: red; color: white;">
                                            Ditolak Pimpinan
                                @elseif($item->status_surat == 8)
                                <mark style="background-color: green; color: white;">
                                            Disetujui Pimpinan
                                @elseif($item->status_surat == 9)
                                <mark style="background-color: blue; color: white;">
                                            Proses Penyelesaian
                                @elseif($item->status_surat == 10)
                                <mark style="background-color: green; color: white;">
                                            Selesai
                                @endif
                            </td>
                            <td>
                                <ul class="list-inline">
                                    @if($item->status_surat == 0 || $item->status_surat == 2 || $item->status_surat == 4 )
                                    <li class="list-inline-item">
                                        <a href="{{ route(ARSIPARIS . '.keluar.forward', $item->id) }}" title="Teruskan Surat" class="btn btn-success btn-sm">
                                        <span class="ti-angle-double-right"></span></a></li>
                                    @endif
                                    @if($item->status_surat == 9)
                                    <li class="list-inline-item">
                                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" data-whatever="@mdo"><span class="ti-check"></span></a></li>

                                      <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        {!! Form::model($item, [
                                          'route'  => [ ARSIPARIS . '.keluar.update', $item->id ],
                                          'method' => 'put',
                                          'files'  => true
                                          ])
                                        !!}  
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Buku Agenda</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">No Agenda:</label>
                                                @if($nom !== null)
                                                <?php $x = (int)$nom->no_agenda; $x = $x+1; ?>
                                                <input class="form-control" name="no_agenda" id="message-text" value="{{ $x }}">
                                                <small id="no_agenda" class="form-text text-muted">No Agenda Surat Keluar Terakhir : {{$nom->no_agenda}}</small>
                                                @else
                                                <input class="form-control" name="no_agenda" id="message-text" value="{{ 1 }}">
                                                <small id="no_agenda" class="form-text text-muted">No Agenda Surat Keluar Terakhir : 0</small>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">Ringkasan Isi:</label>
                                                <input id="ringkasan_isi" type="text" class="form-control @error('ringkasan_isi') is-invalid @enderror" name="ringkasan_isi" autocomplete="ringkasan_isi" required>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                        {!! Form::close() !!}
                                      </div> 
                                        
                                    @endif
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->file_surat) }}" title="Download File Surat" class="btn btn-primary btn-sm" download>
                                        <span class="ti-import"></span></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection