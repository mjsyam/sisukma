@extends('arsiparis.default')

@section('page-header')
    @if(Route::is(ARSIPARIS.'.agenda.masuk') )
        Buku Agenda Surat Masuk
    @else
        Buku Agenda Surat Keluar
    @endif
@endsection

@section('content')
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pengirim</th>
                        <th>Ringkasan Isi</th>
                        <th>Tujuan</th>
                        <th>File Surat</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No Agenda</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pengirim</th>
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
                            @if(Route::is(ARSIPARIS.'.agenda.masuk') )
                                <td>{{ $no }}</td>
                                <td>{{ $item->masuk->no_surat }}</td>
                                <td>{{ $item->masuk->tanggal_surat }}</td>
                                <td>{{ $item->masuk->pengirim }}</td>
                                <td>{{ $item->ringkasan_isi}}</td>
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
                            @else
                                <td>{{ $no }}</td>
                                <td>{{ $item->keluar->no_surat }}</td>
                                <td>{{ $item->keluar->tanggal_ttd }}</td>
                                <td>{{ $item->keluar->user->unit_kerja->unit }}</td>
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
                            @endif
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection
