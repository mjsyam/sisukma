@extends('sekretariat.default')

@section('page-header')
    Surat Keluar <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')
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
                        <th>Tujuan Surat</th>
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
                        <th>Tujuan Surat</th>
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
                            <td><a href="{{ route(SEKRETARIAT. '.keluar.show', $item->id) }}">{{ $item->keperluan_surat }}</a></td>
                            <td><?php $x = config('variables.jenis_tata_naskah');print_r($x[$item->jenis_tata_naskah]);?></td>
                            @if($item->pejabat->role == 7)
                                <td>{{$item->pejabat->wakil_rektor->jabatan}}</td>
                            @elseif($item->pejabat->role == 8)
                                <td>Rektor</td>
                            @endif
                            <td>{{ $item->user->unit_kerja->unit}}</td>
                            <td>{{ $item->tujuan_surat }}</td>
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
                                    <li class="list-inline-item">
                                        <a href="{{ route(SEKRETARIAT . '.keluar.show', $item->id) }}" title="Teruskan Surat" class="btn btn-primary btn-sm">
                                        <span class="ti-pencil"></span></a></li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->file_surat) }}" title="Lihat File Surat" class="btn btn-info btn-sm" target="_blank">
                                        <span class="ti-eye"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ url('storage/surat_keluar/'.$item->file_surat) }}" title="Download File Surat" class="btn btn-success btn-sm" download>
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