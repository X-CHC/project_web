<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/test','Admin::Test');
$routes->get('/admin/main','Admin::Dashboard');
$routes->get('/admin/login','Admin::Login');
$routes->get('/admin/form','Admin::Form');
$routes->get('/admin/anggota','Admin::Anggota');
$routes->get('/admin/angsuran','Admin::Angsuran');

$routes->get('/admin/pembayaran','Admin::Pembayaran');
$routes->get('/admin/anggota/d_anggota','Admin::D_Anggota');

$routes->get('admin/bayar_simpanan_wajib/(:alphanum)','Admin::Bayar_Wajib');
$routes->post('admin/post_bayar','Admin::Post_Bayar_Wajib');

$routes->get('admin/bayar_angsuran/(:alphanum)','Admin::Bayar_Angsuran');
$routes->post('admin/post_bayar_angsuran','Admin::Post_Bayar_Angsuran');

$routes->get('/admin/pinjaman_l','Admin::Pinjaman_Lun');
$routes->get('/admin/pinjaman_bel','Admin::Pinjaman_Bel');
$routes->get('/admin/anggota_p/detail/(:alphanum)','Admin::D_Anggota_P');
$routes->get('/admin/ubah_status_p/(:alphanum)','Admin::Ubah_Status_P');

$routes->get('/admin/edit_anggota_p/(:alphanum)','Admin::edit_anggota_P');
$routes->post('/admin/post_edit_p','Admin::post_edit_P');

$routes->get('/admin/form_sukarela','Admin::Form_Sukarela');
$routes->post('/admin/post_form_sukarela','Admin::Post_Sukarela');

$routes->get('/admin/simpanan_aktif','Admin::Simpanan_A');
$routes->get('/admin/simpanan_t_aktif','Admin::Simpanan_TA');
$routes->get('/admin/simpanan_pokok','Admin::Simpanan_P');
$routes->get('/admin/simpanan_sukarela','Admin::Simpanan_S');

$routes->get('/admin/anggota_s/detail/(:alphanum)','Admin::D_Anggota_S');
$routes->get('/admin/ubah_status_s/(:alphanum)','Admin::Ubah_Status_S');

$routes->get('/admin/edit_anggota_s/(:alphanum)','Admin::edit_anggota_S');
$routes->post('/admin/post_edit_s','Admin::post_edit_S');


$routes->get('/admin/logout','Admin::Logout');
$routes->get('/admin/setting','Admin::Setting');
$routes->get('/admin/input_admin','Admin::Tambah_Admin');
$routes->post('/admin/simpan_admin', 'Admin::simpan_data_admin');
$routes->get('/admin/edit_data_admin/(:alphanum)', 'Admin::edit_data_admin');
$routes->get('/admin/hapus_data_admin/(:alphanum)', 'Admin::hapus_data_admin');

$routes->post('/admin/post_login', 'Admin::post_login');
$routes->post('/admin/post_form', 'Admin::post_form');
$routes->post('/admin/autentikasi', 'Admin::autentikasi');
// atas dosen