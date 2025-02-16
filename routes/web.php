<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Auth::routes(['register' => false]);

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:100']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::post('users/import', 'UserController@import')->name('users.import');
    Route::resource('pengaturan', 'PengaturanController');
});

Route::group(['prefix' => AKADEMIK, 'as' => AKADEMIK . '.', 'middleware'=>['auth', 'Role:10']], function () {
    Route::get('/', 'Akademik\DashboardController@index')->name('dash');

    Route::get('surat/pengajuan', 'Akademik\SuratController@pengajuan')->name('surat.pengajuan');
    Route::get('surat/terverifikasi', 'Akademik\SuratController@terverifikasi')->name('surat.terverifikasi');
    Route::get('surat/diteruskan', 'Akademik\SuratController@diteruskan')->name('surat.diteruskan');
    Route::get('surat/ditolak', 'Akademik\SuratController@ditolak')->name('surat.ditolak');
    Route::get('surat/cetak', 'Akademik\SuratController@cetak')->name('surat.cetak');
    Route::get('surat/menunggu', 'Akademik\SuratController@menunggu_persetujuan')->name('surat.menunggu_persetujuan');
    Route::get('surat/disetujui', 'Akademik\SuratController@disetujui')->name('surat.disetujui');
    Route::get('surat/selesai', 'Akademik\SuratController@selesai')->name('surat.selesai');

    Route::get('surat/verifikasi/{id}', 'Akademik\SuratController@verifikasi')->name('surat.verifikasi');
    Route::get('surat/teruskan/{id}', 'Akademik\SuratController@teruskan')->name('surat.teruskan');
    Route::put('surat/tolak/{id}', 'Akademik\SuratController@tolak')->name('surat.tolak');
    Route::put('surat/cetak/{id}', 'Akademik\SuratController@export')->name('surat.export');
    Route::put('surat/persetujuan/{id}', 'Akademik\SuratController@persetujuan')->name('surat.persetujuan');
    Route::put('surat/penyelesaian/{id}', 'Akademik\SuratController@penyelesaian')->name('surat.penyelesaian');

    Route::resource('surat', 'Akademik\SuratController');
});

Route::group(['prefix' => MAHASISWA, 'as' => MAHASISWA . '.', 'middleware'=>['auth', 'Role:1']], function () {
    Route::get('/', 'Mahasiswa\DashboardController@index')->name('dash');
    Route::resource('surat', 'Mahasiswa\SuratController');
    Route::resource('status', 'Mahasiswa\StatusController');

    Route::get('/skAktifStudi', 'Mahasiswa\SuratController@sk_aktif_studi_create')->name('skAktifStudi.create');
    Route::get('/skAktifOrganisasi', 'Mahasiswa\SuratController@sk_aktif_organisasi_create')->name('skAktifOrganisasi.create');
    Route::get('/skPernahStudi', 'Mahasiswa\SuratController@sk_pernah_studi_create')->name('skPernahStudi.create');
    Route::get('/skPenggantiKTM', 'Mahasiswa\SuratController@sk_pengganti_ktm_create')->name('skPenggantiKTM.create');
    Route::get('/skLulus', 'Mahasiswa\SuratController@sk_lulus_create')->name('skLulus.create');
    Route::get('/skData', 'Mahasiswa\SuratController@sk_data_create')->name('skData.create');
    Route::get('/suratBeasiswa', 'Mahasiswa\SuratController@surat_rekomendasi_beasiswa_create')->name('suratBeasiswa.create');
    Route::get('/spMagang', 'Mahasiswa\SuratController@sp_magang_create')->name('spMagang.create');
    Route::get('/suratPerjalanan', 'Mahasiswa\SuratController@surat_perjalanan_create')->name('suratPerjalanan.create');
    Route::get('/skTA', 'Mahasiswa\SuratController@sk_ta_create')->name('skTA.create');
    Route::get('/suratPeminjaman', 'Mahasiswa\SuratController@surat_peminjaman_create')->name('suratPeminjaman.create');
    Route::get('/spMMTA', 'Mahasiswa\SuratController@sp_mmta_create')->name('spMMTA.create');
    Route::get('/spProposalKP', 'Mahasiswa\SuratController@sp_proposalKP_create')->name('spProposalKP.create');
    Route::get('/spKP', 'Mahasiswa\SuratController@sp_kp_create')->name('spKP.create');
    Route::get('/suratPenelitian', 'Mahasiswa\SuratController@surat_penelitian_create')->name('suratPenelitian.create');

    Route::post('/skAktifStudi', 'Mahasiswa\SuratController@sk_aktif_studi_store')->name('skAktifStudi.store');
    Route::post('/skAktifOrganisasi', 'Mahasiswa\SuratController@sk_aktif_organisasi_store')->name('skAktifOrganisasi.store');
    Route::post('/skPernahStudi', 'Mahasiswa\SuratController@sk_pernah_studi_store')->name('skPernahStudi.store');
    Route::post('/skPenggantiKTM', 'Mahasiswa\SuratController@sk_pengganti_ktm_store')->name('skPenggantiKTM.store');
    Route::post('/skLulus', 'Mahasiswa\SuratController@sk_lulus_store')->name('skLulus.store');
    Route::post('/skData', 'Mahasiswa\SuratController@sk_data_store')->name('skData.store');
    Route::post('/suratBeasiswa', 'Mahasiswa\SuratController@surat_rekomendasi_beasiswa_store')->name('suratBeasiswa.store');
    Route::post('/spMagang', 'Mahasiswa\SuratController@sp_magang_store')->name('spMagang.store');
    Route::post('/suratPerjalanan', 'Mahasiswa\SuratController@surat_perjalanan_store')->name('suratPerjalanan.store');
    Route::post('/skTA', 'Mahasiswa\SuratController@sk_ta_store')->name('skTA.store');
    Route::post('/suratPeminjaman', 'Mahasiswa\SuratController@surat_peminjaman_store')->name('suratPeminjaman.store');
    Route::post('/spMMTA', 'Mahasiswa\SuratController@sp_mmta_store')->name('spMMTA.store');
    Route::post('/spProposalKP', 'Mahasiswa\SuratController@sp_proposalKP_store')->name('spProposalKP.store');
    Route::post('/spKP', 'Mahasiswa\SuratController@sp_kp_store')->name('spKP.store');
    Route::post('/suratPenelitian', 'Mahasiswa\SuratController@surat_penelitian_store')->name('suratPenelitian.store');
});

Route::group(['prefix' => JURUSAN, 'as' => JURUSAN . '.', 'middleware'=>['auth', 'Role:11']], function () {
    Route::get('/', 'Jurusan\DashboardController@index')->name('dash');

    Route::get('surat/pengajuan', 'Jurusan\SuratController@pengajuan')->name('surat.pengajuan');
    Route::get('surat/terverifikasi', 'Jurusan\SuratController@terverifikasi')->name('surat.terverifikasi');
    Route::get('surat/ditolak', 'Jurusan\SuratController@ditolak')->name('surat.ditolak');
    Route::get('surat/cetak', 'Jurusan\SuratController@cetak')->name('surat.cetak');
    Route::get('surat/menunggu', 'Jurusan\SuratController@menunggu_persetujuan')->name('surat.menunggu_persetujuan');
    Route::get('surat/disetujui', 'Jurusan\SuratController@disetujui')->name('surat.disetujui');
    Route::get('surat/selesai', 'Jurusan\SuratController@selesai')->name('surat.selesai');

    Route::get('surat/verifikasi/{id}', 'Jurusan\SuratController@verifikasi')->name('surat.verifikasi');
    Route::put('surat/tolak/{id}', 'Jurusan\SuratController@tolak')->name('surat.tolak');
    Route::put('surat/cetak/{id}', 'Jurusan\SuratController@export')->name('surat.export');
    Route::put('surat/persetujuan/{id}', 'Jurusan\SuratController@persetujuan')->name('surat.persetujuan');
    Route::put('surat/penyelesaian/{id}', 'Jurusan\SuratController@penyelesaian')->name('surat.penyelesaian');

    Route::resource('surat', 'Jurusan\SuratController');
});

Route::group(['prefix' => UNIT, 'as' => UNIT . '.', 'middleware'=>['auth', 'Role:4']], function () {
    Route::get('/', 'Unit\DashboardController@index')->name('dash');
    Route::get('surat/', 'Unit\SuratController@index')->name('surat.index');
    Route::get('surat/approve/', 'Unit\SuratController@approveall')->name('surat.approve.all');
    Route::get('surat/approve/{id}', 'Unit\SuratController@approve')->name('surat.approve');
    Route::get('surat/disetujui/', 'Unit\SuratController@disetujui')->name('surat.disetujui');
    Route::resource('masuk', 'Unit\SuratMasukController');
    Route::resource('keluar', 'Unit\SuratKeluarController');
    Route::resource('internal', 'Unit\SuratUnitController');
});

Route::group(['prefix' => ARSIPARIS, 'as' => ARSIPARIS . '.', 'middleware'=>['auth', 'Role:5']], function () {
    Route::get('/', 'Arsiparis\DashboardController@index')->name('dash');
    Route::resource('masuk', 'Arsiparis\SuratMasukController');
    Route::get('keluar/forward/', 'Arsiparis\SuratKeluarController@forwardall')->name('keluar.forward.all');
    Route::get('keluar/forward/{id}', 'Arsiparis\SuratKeluarController@forward')->name('keluar.forward');
    Route::resource('keluar', 'Arsiparis\SuratKeluarController');
    Route::get('agenda/masuk', 'Arsiparis\BukuAgendaController@masuk')->name('agenda.masuk');
    Route::get('agenda/keluar', 'Arsiparis\BukuAgendaController@keluar')->name('agenda.keluar');
});

Route::group(['prefix' => SEKRETARIAT, 'as' => SEKRETARIAT . '.', 'middleware'=>['auth', 'Role:6']], function () {
    Route::get('/', 'Sekretariat\DashboardController@index')->name('dash');
    Route::resource('masuk', 'Sekretariat\SuratMasukController');
    Route::resource('keluar', 'Sekretariat\SuratKeluarController');
    Route::put('keluar/tolak/{id}', 'Sekretariat\SuratKeluarController@tolak')->name('keluar.tolak');
    Route::get('keluar/setujui/{id}', 'Sekretariat\SuratKeluarController@setujui')->name('keluar.setujui');
});

Route::group(['prefix' => WAREKTOR, 'as' => WAREKTOR . '.', 'middleware'=>['auth', 'Role:7']], function () {
    Route::get('/', 'Warektor\DashboardController@index')->name('dash');
    Route::get('surat/', 'Warektor\SuratController@index')->name('surat.index');
    Route::get('surat/approve/', 'Warektor\SuratController@approveall')->name('surat.approve.all');
    Route::get('surat/approve/{id}', 'Warektor\SuratController@approve')->name('surat.approve');
    Route::get('surat/disetujui/', 'Warektor\SuratController@disetujui')->name('surat.disetujui');
    Route::get('masuk/inbox', 'Warektor\SuratMasukController@inbox')->name('masuk.inbox');
    Route::resource('masuk', 'Warektor\SuratMasukController');
    Route::put('keluar/tolak/{id}', 'Warektor\SuratKeluarController@tolak')->name('keluar.tolak');
    Route::put('keluar/setujui/{id}', 'Warektor\SuratKeluarController@setujui')->name('keluar.setujui');
    Route::resource('keluar', 'Warektor\SuratKeluarController');
});

Route::group(['prefix' => REKTOR, 'as' => REKTOR . '.', 'middleware'=>['auth', 'Role:8']], function () {
    Route::get('/', 'Rektor\DashboardController@index')->name('dash');
    Route::get('masuk/inbox', 'Rektor\SuratMasukController@inbox')->name('masuk.inbox');
    Route::resource('masuk', 'Rektor\SuratMasukController');
    Route::put('keluar/tolak/{id}', 'Rektor\SuratKeluarController@tolak')->name('keluar.tolak');
    Route::put('keluar/setujui/{id}', 'Rektor\SuratKeluarController@setujui')->name('keluar.setujui');
    Route::resource('keluar', 'Rektor\SuratKeluarController');
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/surat', 'SuratMasukController@store')->name('masuk.store');