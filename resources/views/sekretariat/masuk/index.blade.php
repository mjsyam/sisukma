@extends('sekretariat.default')

@section('page-header')
    Surat Masuk <small>{{ trans('app.manage') }}</small>
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
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No Surat</th>
                        <th>Perihal Surat</th>
                        <th>Tanggal Surat Terlampir</th>
                        <th>Tanggal Surat Masuk</th>
                        <th>Tujuan</th>
                        <th>Tujuan Pimpinan</th>
                        <th>Disposisi Pihak kedua</th>
                        <th>Disposisi Pihak ketiga</th>
                        <th>Pengirim</th>
                        <th>Status Surat</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>No Surat</th>
                        <th>Perihal Surat</th>
                        <th>Tanggal Surat Terlampir</th>
                        <th>Tanggal Surat Masuk</th>
                        <th>Tujuan</th>
                        <th>Tujuan Pimpinan</th>
                        <th>Disposisi Pihak kedua</th>
                        <th>Disposisi Pihak ketiga</th>
                        <th>Pengirim</th>
                        <th>Status Surat</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $no = 0;?>
                    @foreach ($items as $item)
                    <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td><a href="{{ route(SEKRETARIAT . '.masuk.show', $item->id) }}">{{ $item->no_surat }}</a></td>
                            <td>{{ $item->perihal_surat }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->tanggal_surat_masuk }}</td>
                            @if($item->tujuan_surat == null)
                            <td>Belum Pasti</td>
                            @else
                                @if($item->user->role == 4)
                                    <td>{{$item->user->unit_kerja->jabatan}} - {{$item->user->unit_kerja->unit}}</td>
                                @elseif($item->user->role == 7)
                                    <td>{{$item->user->wakil_rektor->jabatan}}</td>
                                @elseif($item->user->role == 8)
                                    <td>Rektor</td>
                                @endif
                            @endif
                            @if($item->tujuan_pimpinan == null)
                                <td></td>
                            @else
                                    @if($item->tujuan_pimpinan == 13)
                                        <td>Rektor</td>
                                    @elseif($item->tujuan_pimpinan == 12)
                                        <td>Wakil Rektor Bidang Non Akademik</td>
                                    @elseif($item->tujuan_pimpinan == 52)
                                        <td>Wakil Rektor Bidang Non Akademik</td>
                                    @endif
                            @endif
                            <td>{{ $item->disposisi2 }}</td>
                            <td>{{ $item->disposisi3 }}</td>    
                            <td>{{ $item->pengirim }}</td>
                            <td>
                                @if($item->status_surat == 0)
                                <mark style="background-color: black; color: white;">
                                            Pengajuan dari Eksternal
                                @elseif($item->status_surat == 1)
                                <mark style="background-color: blue; color: white;">
                                            Diproses
                                @elseif($item->status_surat == 2)
                                <mark style="background-color: yellow; color: black;">
                                            Menunggu Disposisi
                                @elseif($item->status_surat == 3)
                                <mark style="background-color: green; color: white;">
                                            Selesai Disposisi
                                @endif
                            </td>
                            <td>
                                <ul class="list-inline">
                                    @if($item->status_surat == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route(SEKRETARIAT . '.masuk.show', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                    @endif
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_masuk/'.$item->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_masuk/'.$item->file_surat) }}" title="Download File Surat" class="btn btn-primary btn-sm" download>
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
