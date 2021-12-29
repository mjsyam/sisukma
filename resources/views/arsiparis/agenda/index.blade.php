@extends('arsiparis.default')

@section('page-header')
    @if(Route::is(ARSIPARIS.'.agenda.masuk') )
        Buku Agenda Surat Masuk
    @else
        Buku Agenda Surat Keluar
    @endif
@endsection

@section('content')
    <style>
        div.dataTables_wrapper {
        width: 1500px;
        margin: 0 auto;
    }
    </style>
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                @if(Route::is(ARSIPARIS.'.agenda.masuk') )
                <thead>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Surat Masuk</th>
                        <th>Pengirim</th>
                        <th>Ringkasan Isi</th>
                        <th>Tujuan dilakukan Disposisi</th>
                        <th>Tujuan Pimpinan</th>
                        <th>Tujuan atau Disposisi </th>
                        <th>Disposisi Pihak Ke 2</th>
                        <th>Disposisi Pihak Ke 3</th>
                        <th>File Surat</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat Terlampir</th>
                        <th>Tanggal Surat Masuk</th>
                        <th>Pengirim</th>
                        <th>Ringkasan Isi</th>
                        <th>Tujuan dilakukan Disposisi</th>
                        <th>Tujuan Pimpinan</th>
                        <th>Tujuan atau Disposisi </th>
                        <th>Disposisi Pihak Ke 2</th>
                        <th>Disposisi Pihak Ke 3</th>
                        <th>File Surat</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $no = 0;?>
                    @foreach ($items as $item)
                    <?php $no++ ;?>
                        <tr>
                            
                            <td>{{ $no }}</td>
                            <td>{{ $item->masuk->no_surat }}</td>
                            <td>{{ $item->masuk->tanggal_surat }}</td>
                            <td>{{ $item->masuk->tanggal_surat_masuk }}</td>
                            <td>{{ $item->masuk->pengirim }}</td>
                            <td>{{ $item->ringkasan_isi}}</td>
                            @if($item->masuk->disposisi == null)
                            <td>Belum di Proses </td>
                            @else
                                <td><?php $x = config('variables.disposisi');print_r($x[$item->masuk->disposisi]);?></td>
                            @endif
                            @if($item->masuk->tujuan_pimpinan == null)
                            <td></td>
                            @else
                                @if($item->masuk->tujuan_pimpinan == 12)
                                    <td>Wakil Rektor Bidang Akademik</td>
                                @elseif($item->masuk->tujuan_pimpinan == 13)
                                    <td>Rektor</td>
                                @elseif($item->masuk->tujuan_pimpinan == 52)
                                    <td>Wakil Rektor Bidang Non Akademik</td>
                                @endif
                            @endif
                            @if($item->masuk->tujuan_surat == null)
                            <td>Belum Pasti</td>
                            @else
                                @if($item->masuk->user->role == 4)
                                    <td>{{$item->masuk->user->unit_kerja->jabatan}} - {{$item->masuk->user->unit_kerja->unit}}</td>
                                @elseif($item->masuk->user->role == 7)
                                    <td>{{$item->masuk->user->wakil_rektor->jabatan}}</td>
                                @elseif($item->masuk->user->role == 8)
                                    <td>Rektor</td>
                                @endif
                            @endif
                            <td>{{ $item->masuk->disposisi2}}</td>
                            <td>{{ $item->masuk->disposisi3}}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_masuk/'.$item->masuk->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_masuk/'.$item->masuk->file_surat) }}" title="Download File Surat" class="btn btn-primary btn-sm" download>
                                        <span class="ti-import"></span></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>            
                @else
                <thead>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Tanggal Surat Ditandatangani</th>
                        <th>Pengirim</th>
                        <th>Pejabat Penandatangan</th>
                        <th>Ringkasan Isi</th>
                        <th>Tujuan</th>
                        <th>File Surat</th>
                    </tr>

                </thead>
                <tfoot>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Jenis Tata Naskah</th>
                        <th>Tanggal Surat Ditandatangani</th>
                        <th>Pengirim</th>
                        <th>Pejabat Penandatangan</th>
                        <th>Ringkasan Isi</th>
                        <th>Tujuan</th>
                        <th>File Surat</th>
                    </tr>

                </tfoot>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($items as $item)
                    <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->keluar->no_surat }}</td>
                            <td><?php $x = config('variables.jenis_tata_naskah');print_r($x[$item->keluar->jenis_tata_naskah]);?></td>
                            <td>{{ $item->keluar->tanggal_ttd }}</td>
                            <td>{{ $item->keluar->user->unit_kerja->unit }}</td>
                            @if($item->keluar->pejabat->role == 7)
                                <td>{{$item->keluar->pejabat->wakil_rektor->jabatan}}</td>
                            @elseif($item->keluar->pejabat->role == 8)
                                <td>Rektor</td>
                            @endif
                            <td>{{ $item->ringkasan_isi}}</td>
                            <td>{{ $item->keluar->tujuan_surat }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->keluar->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->keluar->file_surat) }}" title="Download File Surat" class="btn btn-primary btn-sm" download>
                                        <span class="ti-import"></span></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>    
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>
    </div>

@endsection
