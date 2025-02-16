        <!-- TTD -->
        <div class="row">
            <div class="col justify-content-end">
                @if($surat->nama_surat == "SP-MMTA")
                <table width="280px" align="right" style="font-size: 90%;">
                @else
                <table width="280px" align="right">
                @endif
                    <tr>
                        @if($surat->status_surat >= 10 || $surat->status_surat >= 20)
                        <img src="{{public_path().'/storage/ttd_stempel/'.$pejabat->stempel}}" style="z-index: -10; top: -10px; right: 220px; position: absolute;" width="150px" height="150px;"><br>
                        @endif
                        <td style="">
                            @if($pejabat->jabatan == 'Wakil Rektor Akademik')
                            {{ $pejabat->user->wakil_rektor->jabatan }},
                            @else
                            {{ $pejabat->jabatan }}
                            @endif
                            <br><br><br>
                            @if($surat->status_surat >= 10 || $surat->status_surat >= 20)
                            <img src="{{public_path().'/storage/ttd_stempel/'.$pejabat->tanda_tangan}}" style="z-index: 1; top: 20px; position: absolute;" height="90px;"><br>
                            @endif
                            {{ $pejabat->user->name }}<p>
                            @if($pejabat->jabatan == 'Wakil Rektor Akademik')
                            NIP {{ $pejabat->user->wakil_rektor->no_induk_pegawai }}
                            @else
                            NIP {{ $pejabat->user->unit_kerja->no_induk_pegawai}}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END TTD -->
    </div><br><br>