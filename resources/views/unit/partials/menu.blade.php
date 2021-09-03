@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ Str::startsWith($route, UNIT. '.dash') ? 'actived' : '' }}" href="{{ route(UNIT . '.dash') }}">
        <span class="icon-holder">
            <i class="c-black-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
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
@foreach($pengaturan as $p)
@if(Auth::user()->id === $p->id_users)
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
@endif
@endforeach
