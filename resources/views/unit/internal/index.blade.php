@extends('unit.default')

@section('page-header')
    Surat Internal Unit <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(UNIT . '.internal.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No Surat</th>
                        <th>Keperluan Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Tanggal Surat</th>
                        <th>Tujuan Surat</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>No Surat</th>
                        <th>Keperluan Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Tanggal Surat</th>
                        <th>Tujuan Surat</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $no = 0;?>
                    @foreach ($items as $item)
                    <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->no_surat }}</td>
                            <td>{{ $item->keperluan_surat }}</td>
                            <td><?php $x = config('variables.jenis_tata_naskah');print_r($x[$item->jenis_tata_naskah]);?></td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->tujuan_surat }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_internal/'.$item->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_internal/'.$item->file_surat) }}" title="Download File Surat" class="btn btn-primary btn-sm" download>
                                        <span class="ti-import"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" data-whatever="@mdo"><span class="ti-trash"></span></a></li>

                                      <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(UNIT . '.internal.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!} 
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Peringatan penghapusan surat</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <h4 style="color:red">Apakah anda yakin ingin menghapus surat ini ?</h4>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                        {!! Form::close() !!}
                                      </div> 
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection