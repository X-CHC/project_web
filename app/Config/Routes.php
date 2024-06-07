<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/admin/test','Admin::Test');
$routes->get('/admin/main','Admin::Dashboard');
$routes->get('/admin/login','Admin::Login');
$routes->get('/admin/form','Admin::Form');
$routes->get('/admin/anggota','Admin::Anggota');
$routes->get('/admin/simpanan','Admin::Simpanan');
$routes->get('/admin/angsuran','Admin::Angsuran');

$routes->get('/admin/pinjaman','Admin::Pinjaman');

$routes->get('/admin/pembayaran','Admin::Pembayaran');
$routes->get('/admin/anggota/d_anggota','Admin::D_Anggota');
$routes->get('/admin/anggota/d_anggota_2','Admin::D_Anggota_2');

$routes->get('/admin/logout','Admin::Logout');
$routes->get('/admin/setting','Admin::Setting');
$routes->get('/admin/input_admin','Admin::Tambah_Admin');
$routes->post('/admin/simpan_admin', 'Admin::simpan_data_admin');

$routes->post('/admin/post_login', 'Admin::post_login');
$routes->post('/admin/post_form', 'Admin::post_form');
$routes->post('/admin/autentikasi', 'Admin::autentikasi');
// atas dosen