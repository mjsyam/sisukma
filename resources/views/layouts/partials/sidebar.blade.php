@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<div class="sidebar">
	<div class="sidebar-inner">
		<!-- ### $Sidebar Header ### -->
		<div class="sidebar-logo">
			<div class="peers ai-c fxw-nw">
				<div class="peer peer-greed">
					<a class='sidebar-link td-n' href="/">
						<div class="peers ai-c fxw-nw">
							<div class="peer">
								<div class="logo">
									<img src="{{ asset('Logo.png') }}" style="border-radius: 50%;height: 4rem;width: 7.5rem;object-fit: contain;" alt="">
								</div>
							</div>
							<div class="peer peer-greed">
								<h5 class="lh-1 mB-0 logo-text">SISUKMA</h5>
							</div>
						</div>
					</a>
				</div>
				<div class="peer">
					<div class="mobile-toggle sidebar-toggle">
						<a href="" class="td-n">
							<i class="ti-arrow-circle-left"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- ### $Sidebar Menu ### -->
		<ul class="sidebar-menu scrollable pos-r">
      {{-- all --}}
			<li class="nav-item mT-30">
          <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.dash') ? 'actived' : '' }}" href="{{ route(ADMIN . '.dash') }}">
              <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
              </span>
              <span class="title">Dashboard</span>
          </a>
      </li>

      {{--  --}}

      {{-- admin --}}
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.users') ? 'actived' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
              <span class="icon-holder">
                  <i class="c-brown-500 ti-user"></i>
              </span>
              <span class="title">Users</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.pengaturan') ? 'actived' : '' }}" href="{{ route(ADMIN . '.pengaturan.index') }}">
              <span class="icon-holder">
                  <i class="c-red-300 ti-settings"></i>
              </span>
              <span class="title">Pengaturan</span>
          </a>
      </li>

      {{-- akademik --}}
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-purple-500 ti-write"></i>
            </span>
          <span class="title">Surat</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.pengajuan') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.pengajuan') }}">Pengajuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.terverifikasi') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.terverifikasi') }}">Terverifikasi</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.diteruskan') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.diteruskan') }}">Diteruskan</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.ditolak') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.ditolak') }}">Ditolak</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.cetak') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.cetak') }}">Cetak</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.menunggu_persetujuan') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.menunggu_persetujuan') }}">Menunggu Persetujuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.disetujui') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.disetujui') }}">Disetujui</a>
            <a class="sidebar-link {{ Str::startsWith($route, AKADEMIK . '.surat.selesai') ? 'active' : '' }}" href="{{ route(AKADEMIK . '.surat.selesai') }}">Selesai</a>
          </li>               
        </ul>
      </li>

      {{-- arsiparis --}}
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, ARSIPARIS. '.masuk') ? 'actived' : '' }}" href="{{ route(ARSIPARIS . '.masuk.index') }}">
              <span class="icon-holder">
                  <i class="c-green-500 ti-email"></i>
              </span>
              <span class="title">Surat Masuk</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, ARSIPARIS. '.keluar') ? 'actived' : '' }}" href="{{ route(ARSIPARIS . '.keluar.index') }}">
              <span class="icon-holder">
                  <i class="c-red-500 ti-files"></i>
              </span>
              <span class="title">Surat Keluar</span>
          </a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-purple-500 ti-book"></i>
            </span>
          <span class="title">Buku Agenda</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, ARSIPARIS. '.agenda.masuk') ? 'actived' : '' }}" href="{{ route(ARSIPARIS . '.agenda.masuk') }}">Surat Masuk</a>
            <a class="sidebar-link {{ Str::startsWith($route, ARSIPARIS. '.agenda.keluar') ? 'actived' : '' }}" href="{{ route(ARSIPARIS . '.agenda.keluar') }}">Surat Keluar</a>
          </li>               
        </ul>
      </li>

      {{-- jurusan --}}
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-purple-500 ti-write"></i>
          </span>
          <span class="title">Surat</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.pengajuan') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.pengajuan') }}">Pengajuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.terverifikasi') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.terverifikasi') }}">Terverifikasi</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.ditolak') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.ditolak') }}">Ditolak</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.cetak') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.cetak') }}">Cetak</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.menunggu_persetujuan') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.menunggu_persetujuan') }}">Menunggu Persetujuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.disetujui') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.disetujui') }}">Disetujui</a>
            <a class="sidebar-link {{ Str::startsWith($route, JURUSAN . '.surat.selesai') ? 'active' : '' }}" href="{{ route(JURUSAN . '.surat.selesai') }}">Selesai</a>
          </li>               
        </ul>
      </li>

      {{-- Mahasiswa --}}
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, MAHASISWA . '.surat') ? 'actived' : '' }}" href="{{ route(MAHASISWA . '.surat.index') }}">
              <span class="icon-holder">
                  <i class="c-green-500 ti-write"></i>
              </span>
              <span class="title">Buat Surat</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, MAHASISWA . '.status') ? 'actived' : '' }}" href="{{ route(MAHASISWA . '.status.index') }}">
              <span class="icon-holder">
                  <i class="c-blue-500 ti-agenda"></i>
              </span>
              <span class="title">Status Surat</span>
          </a>
      </li>
      
      {{-- rektor --}}
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-green-500 ti-email"></i>
            </span>
          <span class="title">Surat Masuk</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, REKTOR. '.masuk.index') ? 'actived' : '' }}" href="{{ route(REKTOR . '.masuk.index') }}">Menunggu Disposisi</a>
            <a class="sidebar-link {{ Str::startsWith($route, REKTOR. '.masuk.inbox') ? 'actived' : '' }}" href="{{ route(REKTOR . '.masuk.inbox') }}">Surat Masuk</a>
          </li>               
        </ul>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, REKTOR. '.keluar') ? 'actived' : '' }}" href="{{ route(REKTOR . '.keluar.index') }}">
              <span class="icon-holder">
                  <i class="c-red-500 ti-files"></i>
              </span>
              <span class="title">Surat Keluar</span>
          </a>
      </li>

      {{-- sekretariat --}}
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, SEKRETARIAT. '.masuk') ? 'actived' : '' }}" href="{{ route(SEKRETARIAT . '.masuk.index') }}">
              <span class="icon-holder">
                  <i class="c-green-500 ti-email"></i>
              </span>
              <span class="title">Surat Masuk</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, SEKRETARIAT. '.keluar') ? 'actived' : '' }}" href="{{ route(SEKRETARIAT . '.keluar.index') }}">
              <span class="icon-holder">
                  <i class="c-red-500 ti-files"></i>
              </span>
              <span class="title">Surat Keluar</span>
          </a>
      </li>

      {{-- unit --}}
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, UNIT. '.masuk') ? 'actived' : '' }}" href="{{ route(UNIT . '.masuk.index') }}">
              <span class="icon-holder">
                  <i class="c-green-500 ti-email"></i>
              </span>
              <span class="title">Surat Masuk</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, UNIT. '.keluar') ? 'actived' : '' }}" href="{{ route(UNIT . '.keluar.index') }}">
              <span class="icon-holder">
                  <i class="c-red-500 ti-files"></i>
              </span>
              <span class="title">Surat Keluar</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, UNIT. '.internal') ? 'actived' : '' }}" href="{{ route(UNIT . '.internal.index') }}">
              <span class="icon-holder">
                  <i class="c-blue-500 ti-folder"></i>
              </span>
              <span class="title">Surat Internal</span>
          </a>
      </li>
      <li class="nav-item">
          <hr class="rounded" style="border-top: 3px solid #89CFF0; border-radius: 5px;">
          <h4 class="pl-4">E-SURAT</h4>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-purple-500 ti-notepad"></i>
            </span>
          <span class="title">Surat Akademik</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, UNIT . '.surat.index') ? 'actived' : '' }}" href="{{ route(UNIT . '.surat.index') }}">Menunggu Persetujuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, UNIT . '.surat.disetujui') ? 'actived' : '' }}" href="{{ route(UNIT . '.surat.disetujui') }}">Disetujui</a>
          </li>               
        </ul>
      </li>

      {{-- warektor --}}
      <li class="nav-item">
        <hr class="rounded" style="border-top: 3px solid #89CFF0; border-radius: 5px;">
        <h4 class="pl-4">E-SURAT</h4>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-purple-500 ti-notepad"></i>
          </span>
          <span class="title">Surat Akademik</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, WAREKTOR . '.surat.index') ? 'actived' : '' }}" href="{{ route(WAREKTOR . '.surat.index') }}">Menunggu Persetujuan</a>
            <a class="sidebar-link {{ Str::startsWith($route, WAREKTOR . '.surat.disetujui') ? 'actived' : '' }}" href="{{ route(WAREKTOR . '.surat.disetujui') }}">Disetujui</a>
          </li>               
        </ul>
      </li>
      <li class="nav-item">
          <hr class="rounded" style="border-top: 3px solid #89CFF0; border-radius: 5px;">
          <h4 class="pl-4">E-OFFICE</h4>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-green-500 ti-email"></i>
            </span>
          <span class="title">Surat Masuk</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="sidebar-link {{ Str::startsWith($route, WAREKTOR . '.masuk.index') ? 'actived' : '' }}" href="{{ route(WAREKTOR . '.masuk.index') }}">Menunggu Disposisi</a>
            <a class="sidebar-link {{ Str::startsWith($route, WAREKTOR . '.masuk.inbox') ? 'actived' : '' }}" href="{{ route(WAREKTOR . '.masuk.inbox') }}">Surat Masuk</a>
          </li>               
        </ul>
      </li>
      <li class="nav-item">
          <a class="sidebar-link {{ Str::startsWith($route, WAREKTOR. '.keluar') ? 'actived' : '' }}" href="{{ route(WAREKTOR . '.keluar.index') }}">
              <span class="icon-holder">
                  <i class="c-red-500 ti-files"></i>
              </span>
              <span class="title">Surat Keluar</span>
          </a>
      </li>
		</ul>
    <br>
    <br>
    <br>
    <br>
	</div>
</div>