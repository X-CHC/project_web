<?php

namespace App\Controllers;

//bawah model database
use App\Models\M_Admin;
use App\Models\M_Simpanan;
use App\Models\M_Simpanan_Wajib;
use App\Models\M_Simpanan_Sukarela;
use App\Models\M_Pinjaman;
use App\Models\M_Angsuran;
//atas model database



class Admin extends BaseController
{
    protected $helpers =['form'];
    #awal cek login
    public function autentikasi(){
        $modelAdmin = new M_Admin;
        

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getNumRows();
        if ($cekUsername === 0){

            return redirect()->to(base_url('/admin/login'))->with('hasil', 'Gagal');

        } else {
            $dataUser = $modelAdmin->getDataAdmin(['username_admin' => $username])->getRowArray();

            $verifikasi_password = password_verify($password, $dataUser['password_admin']);

            if(!$verifikasi_password){
                return redirect()->to(base_url('/admin/login'))->with('hasil', 'Gagal');
            }

            else{
                $dataSession = [
                    'ses_id' => $dataUser['id_admin'],
                    'ses_user' => $dataUser['nama_admin'],
                ];
                session()->set($dataSession);
                return redirect()->to(base_url('/admin/login'))->with('hasil', 'Berhasil');
            }
        }
    }
    #akhir cek login

    # awal form anggota  
    public function post_form(){
        

        $valid = $this->request->getPost('jenisAnggota');
        if( $valid == "P"){
            $rules = [
                'namaLengkap' => ['label' => 'Nama Lengkap','rules' => 'required'],
                'tanggalLahir' => ['label' => 'Tanggal Lahir','rules' => 'required'],
                'alamat' => ['label' => 'Alamat','rules' => 'required'],

                'nik' => ['label' => 'NIK','rules' => 'required|numeric'],
                'jenisKelamin' => ['label' => 'Jenis Kelamin','rules' => 'required'],
                'noTelpon' => ['label' => 'No. Telpon','rules' => 'required|numeric'],
                'email' => ['label' => 'Email','rules' => 'required'],
                'jenisAnggota' => ['label' => 'Alamat','rules' => 'required'],
                'cicilan' => ['label' => 'Alamat','rules' => 'required'],
                'totalPinjaman' => ['label' => 'Total Pinjaman','rules' => 'required'],
            ];
        } else if($valid == "SP"){
            $rules = [
                'namaLengkap' => ['label' => 'Nama Lengkap','rules' => 'required'],
                'tanggalLahir' => ['label' => 'Tanggal Lahir','rules' => 'required'],
                'alamat' => ['label' => 'Alamat','rules' => 'required'],
                'nik' => 'required|numeric|max_length[14]',
                'jenisKelamin' => ['label' => 'Jenis Kelamin','rules' => 'required'],
                'noTelpon' => ['label' => 'No. Telpon','rules' => 'required|numeric'],
                'email' => ['label' => 'Email','rules' => 'required'],
                'jenisAnggota' => ['label' => 'Alamat','rules' => 'required'],
            ];
        }

        if (!$this->request->is('post')) {
            session()->set(['error_list'=>validation_list_errors()]);
            return redirect()->to(base_url('/admin/form'))->with('hasil', 'gak_jelas');

            

        } elseif (!$this->validate($rules)) {
            session()->set(['error_list'=>validation_list_errors()]);
            return redirect()->to(base_url('/admin/form'))->with('hasil', 'gak_jelas');
        } else {
            session()->remove('error_list');
            


            if( $valid == "P"){
                $modelAdmin = new M_Pinjaman;
                $modelAngsuran = new M_Angsuran;  

                $nama= $this->request->getPost('namaLengkap');
                $tgl = $this->request->getPost('tanggalLahir');
                $alamat = $this->request->getPost('alamat');
                $nik = $this->request->getPost('nik');
                $jk = $this->request->getPost('jenisKelamin');
                $nomor = $this->request->getPost('noTelpon');
                $email = $this->request->getPost('email');
                $total_p = $this->request->getPost('totalPinjaman');
                $status = "Aktif";
                $admin = 10000;

                $bunga = $total_p * 0.07;
                $totalSemua = $total_p + $bunga + $admin;
                $cicilan = $this->request->getPost('cicilan');
                $perCicilan = ceil($totalSemua / $cicilan); // ini untuk bagi cicilan, dan bulat ke atas
                $perCicilanBulat = round($perCicilan, -3);
                
                $hasil = $modelAdmin->autoNumber()->getRowArray();
                
                if (!$hasil) {
                    $id = "PJN001";
                } else {
                    $kode = $hasil['id_pinjaman'];
                    $noUrut = (int)substr($kode, -3);
                    $noUrut++;
                    $id = "PJN" . sprintf("%03s", $noUrut);
                }

                $dataSimpan = [
                    'id_pinjaman' => $id,
                    'nama' => $nama,
                    'tgl_lahir' => $tgl,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'jenis_kelamin' => $jk,
                    'telpon' => $nomor,
                    'email' => $email,
                    'status' => $status,
                    'total_p' => $totalSemua,
                    'total_a' => '0',
                    'deleted' => '0',
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                ];

                $modelAdmin->saveDataAnggota($dataSimpan);

                // bahan while
                $tanggal_sekarang = date('Y-m-d');
                $counter = 0;
                
                while ($counter < $cicilan) {
                    $id_p = $id;
                    $tanggal_sekarang = date('Y-m-d', strtotime($tanggal_sekarang . ' +1 month'));
                    $counter++;
                    $tes = $modelAngsuran->autoNumber()->getRowArray();
                    if (!$tes) {
                        $id_a= "ANG001";
                    } else {
                        $kode = $tes['id_angsuran'];
                        $noUrut = (int)substr($kode, -3);
                        $noUrut++;
                        $id_a = "ANG" . sprintf("%03s", $noUrut);
                    }

                    $data = [
                        'id_angsuran' => $id_a,
                        'id_pinjaman' => $id_p,
                        'tgl_bayar' => $tanggal_sekarang,
                        'total_b' => $perCicilanBulat,
                        'bukti' => '0',
                    ];
                    $modelAngsuran->saveDataAnggota($data);
                }
    
                return redirect()->to(base_url('/admin/form'))->with('hasil', 'Berhasil');

                

            } else if( $valid == "SP"){
                $modelAdmin = new M_Simpanan; 


                $coverBuku = $this->request->getFile('bukti_p');
                $ext1 = $coverBuku->getClientExtension();
                $namaFile1 = "Bukti-".date("ymdHis").".".$ext1;
                $coverBuku->move('Assets/Bukti_P',$namaFile1);

                $nama= $this->request->getPost('namaLengkap');
                $tgl = $this->request->getPost('tanggalLahir');
                $alamat = $this->request->getPost('alamat');
                $nik = $this->request->getPost('nik');
                $jk = $this->request->getPost('jenisKelamin');
                $nomor = $this->request->getPost('noTelpon');
                $email = $this->request->getPost('email');
                $email = $this->request->getPost('email');

                $status = "Aktif";

                $hasil = $modelAdmin->autoNumber()->getRowArray();
                if (!$hasil) {
                    $id = "SPN001";
                } else {
                    $kode = $hasil['id_simpanan'];
                    $noUrut = (int)substr($kode, -3);
                    $noUrut++;
                    $id = "SPN" . sprintf("%03s", $noUrut);
                }
    
                $dataSimpan = [
                    'id_simpanan' => $id,
                    'nama' => $nama,
                    'tgl_lahir' => $tgl,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'jenis_kelamin' => $jk,
                    'bukti_p' => $namaFile1,
                    'telpon' => $nomor,
                    'email' => $email,
                    'status' => $status,
                    'deleted' => '0',
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                ];
    
                $modelAdmin->saveDataAnggota($dataSimpan);
                return redirect()->to(base_url('/admin/form'))->with('hasil', 'Berhasil');
            }
            
        }
        
    }
    #akhir form anggota

    # awal admin fitur
    public function Setting(){
        
        $modelAdmin = new M_Admin; //inisiasi model admin
        $dataUser = $modelAdmin->getDataAdmin(['is_delete_admin'=>'0'])->getResultArray();
        $kirim['data_user']= $dataUser;

        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Master_Admin/setting');
        echo view ('Backend/Template/fuuter');  
             
    }
    public function simpan_data_admin(){
        
        $modelAdmin = new M_admin; //inisiasi model admin
        
        $nama = $this ->request->getPost('namaAdmin');
        $username = $this ->request->getPost('usernameAdmin');
        $level = $this ->request->getPost('level');

        $dataUser = $modelAdmin->getDataAdmin(['username_admin'=>$username])->getnumRows();    
        if($dataUser > 0){
            return redirect()->to(base_url('/admin/setting'))->with('hasil', 'gagal_admin');
        }
        else{
            $hasil = $modelAdmin->autoNumber()->getRowArray();
            if(!$hasil){
                $id = "ADM001";
            }
            else{
                $kode = $hasil['id_admin'];
                $noUrut = (int) substr($kode, -3);
                $noUrut++;
                $id = "ADM".sprintf("%03s", $noUrut);
                
                $password_default = "pass_admin"; // default password

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $password_admin = isset($_POST["pw_admin"]) ? $_POST["pw_admin"] : $password_default;
                    $password_admin_hashed = password_hash($password_admin, PASSWORD_DEFAULT);

                    
                }

            }    
            $dataSimpan = [
                'id_admin'=> $id,
                'nama_admin'=> $nama,
                'username_admin'=> $username,
                'password_admin'=> $password_admin_hashed,
                'akses_level'=> $level,
                'is_delete_admin'=> '0',
                'created_at'=> date('Y-m-d-H:i:s'),
                'update_at'=> date('Y-m-d-H:i:s')
            ];

            $modelAdmin->saveDataAdmin($dataSimpan);
            return redirect()->to(base_url('/admin/setting'))->with('hasil', 'Masuk');
            
            
        }
        
    }
    public function Tambah_Admin(){
        session()->remove('error_list');
        $modelAdmin = new M_admin; //inisiasi model admin

        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Master_Admin/input_admin');
        echo view ('Backend/Template/fuuter');  
            
    }
    public function Logout(){
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            return redirect()->to(base_url('/admin/form'));
        }
        else{
            session()->remove('ses_id');
            session()->remove('ses_user');
            session()->remove('ses_level');
            return redirect()->to(base_url('/admin/login'));
            
            }


    }
    public function hapus_data_admin(){
        
            $modelAdmin = new M_Admin; // inisiasi

            $uri = service('uri');
            $idHapus = $uri->getSegment(3);

            $dataSimpan = [
                'is_delete_admin' => "1",
                'update_at' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAdmin($dataSimpan, ['sha1(id_admin)' => $idHapus]);
            return redirect()->to(base_url('/admin/setting'))->with('hasil', 'hapus_admin');
            
        
    }
    #akhir admin fitur

    #awal fitur simpanan

    public function Simpanan_A(){
        // ini daftar anggota
        $modelAdmin = new M_Simpanan;
        $dataUser = $modelAdmin->getDataAnggota(['status'=>'0'])->getResultArray();
        $kirim['data_user']= $dataUser;

        $uri = service('uri');

        $status = "aktif" ;
        $pages = "simpanan";

        $kirim ['asal'] = $pages;
        $kirim['status']= $status;
        $kirim['data_user']= $dataUser;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/simpanan', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function Simpanan_TA(){
        // ini daftar anggota
        $modelAdmin = new M_Simpanan;
        $dataUser = $modelAdmin->getDataAnggota(['status'=>'1'])->getResultArray();

        $uri = service('uri');

        $status = "taktif" ;
        $pages = "simpanan";

        $kirim ['asal'] = $pages;
        $kirim['data_user']= $dataUser;
        $kirim['status']= $status;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/simpanan', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function tbl_pokok(){
        
        $modelAdmin = new M_Simpanan;
        $dataUser = $modelAdmin->getDataAdmin(['deleted'=>'0'])->getResultArray();
        $kirim['data_user']= $dataUser;

        $uri = service('uri');

        $pages = "simpanan";

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Master_Admin/setting', $kirim);
        echo view ('Backend/Template/fuuter');  
             
    }
    public function D_Anggota_S(){
        $modelAdmin = new M_Simpanan;
        $modelA = new M_Simpanan_Wajib;
        $uri = service('uri');

        $pages = 'simpanan';
        $idEdit = $uri->getSegment(4);
        $dataBuku = $modelAdmin->getDataAnggota(['sha1(id_simpanan)' => $idEdit])->getRowArray();
        $si_id = $dataBuku['id_simpanan'];

        $dataB = $modelA->getDataAnggota(['id_simpanan' => $si_id])->getResultArray();



       
        $kirim ['asal'] = $pages;
        $kirim['data'] = $dataBuku;
        $kirim['data_s'] = $dataB;

        $kirim ['asal'] = $pages;
        $kirim['data'] = $dataBuku;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/detail_s', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function Ubah_Status_S(){
        
        $modelAdmin = new M_Simpanan; // inisiasi

        $uri = service('uri');
        $idHapus = $uri->getSegment(3);
        $dataEdit = $modelAdmin->getDataAnggota(['deleted' => '0', 'sha1(id_simpanan)' => $idHapus])->getRowArray();
        $status = $dataEdit['status'];
        
        if ($status == '0'){
            $dataSimpan = [
                'status' => "1",
                'updated' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAnggota($dataSimpan, ['sha1(id_simpanan)' => $idHapus]);
            return redirect()->to(base_url('/admin/simpanan_t_aktif'))->with('hasil', 'status_s');
        }elseif ($status == '1') {
            $dataSimpan = [
                'status' => "0",
                'updated' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAnggota($dataSimpan, ['sha1(id_simpanan)' => $idHapus]);
            return redirect()->to(base_url('/admin/simpanan_aktif'))->with('hasil', 'status_s');
        }
    }
    public function Simpanan_P(){
        
        $modelAdmin = new M_Simpanan; //inisiasi model admin
        $dataUser = $modelAdmin->getDataAnggota(['deleted'=>'0'])->getResultArray();

        $uri = service('uri');

        $pages = 'simpanan';

        $kirim ['asal'] = $pages;
        $kirim['data_user']= $dataUser;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/simpanan_p', $kirim);
        echo view ('Backend/Template/fuuter');  
             
    }
    public function edit_anggota_S()
    {
        
        $modelEdit = new M_Simpanan(); // inisiasi

        $uri = service('uri');
        $page = 'simpanan';
        $pages = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);
        $dataEdit = $modelEdit->getDataAnggota(['sha1(id_simpanan)' => $idEdit])->getRowArray();

        session()->set(['idUpdate' => $dataEdit['id_simpanan']]);
        $data['pages'] = $pages;
        $data['asal'] = $page;
        $data['data_edit'] = $dataEdit;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Main/Simpanan/edit', $data);
        echo view('Backend/Template/fuuter', $data);
    }
    public function post_edit_S()
    {
        $modelSimpanan = new M_Simpanan;

        $idUpdate = session()->get('idUpdate');
        $nama = $this->request->getPost('namaLengkap');
        $tgl = $this->request->getPost('tanggalLahir');
        $alamat = $this->request->getPost('alamat');
        $nik = $this->request->getPost('nik');
        $jk = $this->request->getPost('jenisKelamin');
        $nomor = $this->request->getPost('noTelpon');
        $email = $this->request->getPost('email');

        $dataUpdate = [
            'nama' => $nama,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'nik' => $nik,
            'jenis_kelamin' => $jk,
            'telpon' => $nomor,
            'email' => $email,
            'deleted' => '0',
            'updated' => date('Y-m-d H:i:s')
        ];
        $whereUpdate = ['id_simpanan' => $idUpdate];

        $modelSimpanan->updateDataAnggota($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        return redirect()->to(base_url('/admin/login'))->with('hasil', 'update_done');
    }
    Public function Bayar_Wajib()
    {
        
        $modelEdit = new M_Simpanan(); // inisiasi

        $uri = service('uri');
        $pages = 'simpanan';
        $idEdit = $uri->getSegment(3);
        $dataEdit = $modelEdit->getDataAnggota(['sha1(id_simpanan)' => $idEdit])->getRowArray();

        session()->set(['idUpdate' => $dataEdit['id_simpanan']]);
        
        $data['asal'] = $pages;
        $data['data_edit'] = $dataEdit;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Main/Simpanan/bayar_wajib', $data);
        echo view('Backend/Template/fuuter', $data);
    }
    public function Post_Bayar_Wajib()
    {
        $modelSimpanan = new M_Simpanan;
        $modelWajib = new M_Simpanan_Wajib;
        $idUpdate = session()->get('idUpdate');

        $hasil = $modelWajib->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "SPW001";
        } else {
            $kode = $hasil['id_sim_w'];
            $noUrut = (int)substr($kode, -3);
            $noUrut++;
            $id = "SPW" . sprintf("%03s", $noUrut);
        }

        $coverBuku = $this->request->getFile('bukti_p');
        $ext1 = $coverBuku->getClientExtension();
        $namaFile1 = "BuktiW-".date("ymdHis").".".$ext1;
        $coverBuku->move('Assets/Bukti_W',$namaFile1);
        $whereUpdate = ['id_simpanan' => $idUpdate];
        $dataUpdate = [
            'id_sim_w' => $id,
            'id_simpanan' => $whereUpdate,
            'tgl_bayar' => date('Y-m-d H:i:s'),
            'total_b' => '25000',
            'bukti' => $namaFile1,
        ];

        $modelWajib->saveDataAnggota($dataUpdate);
        ?>
            <script>
                history.go(-2);
            </script>
        <?php
        session()->remove('idUpdate');
        session()->setFlashdata('hasil','bayar');
    }
    public function Simpanan_S(){
        
        $modelAdmin = new M_Simpanan_Sukarela; //inisiasi model admin
        $dataUser = $modelAdmin->getDataAnggota(['deleted'=>'0'])->getResultArray();

        $uri = service('uri');

        $pages = 'simpanan';

        $kirim ['asal'] = $pages;
        $kirim['data_user']= $dataUser;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/simpanan_sukarela', $kirim);
        echo view ('Backend/Template/fuuter');  
             
    }
    public function Form_Sukarela(){
    

        $pages = "simpanan";

        $kirim ['asal'] = $pages;

        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Simpanan/form_sukarela', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function Post_Sukarela()
    {
        $modelSimpanan = new M_Simpanan_Sukarela;

        $hasil = $modelSimpanan->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "SPS001";
        } else {
            $kode = $hasil['id_sim_s'];
            $noUrut = (int)substr($kode, -3);
            $noUrut++;
            $id = "SPS" . sprintf("%03s", $noUrut);
        }

        $nomor = $this->request->getPost('noTelpon');
        $nama= $this->request->getPost('namaLengkap');
        $coverBuku = $this->request->getFile('bukti_p');
        $ext1 = $coverBuku->getClientExtension();
        $namaFile1 = "BuktiSS-".date("ymdHis").".".$ext1;
        $coverBuku->move('Assets/Bukti_S_S',$namaFile1);
        $dataUpdate = [
            'id_sim_s' => $id,
            'tgl_bayar' => date('Y-m-d H:i:s'),
            'total_b' => $nomor,
            'bukti' => $namaFile1,
        ];

        $modelSimpanan->saveDataAnggota($dataUpdate);
        ?>
            <script>
                history.go(-2);
            </script>
        <?php
        session()->setFlashdata('hasil','bayar');
    }




    #akhir fitur simpanan

    #awal fitur pinjaman

    public function Pinjaman_Lun(){
        // daftar anggota

        $modelAdmin = new M_Pinjaman; 
        $dataUser = $modelAdmin->getDataAnggota(['status'=>'1'])->getResultArray();
        $kirim['data_user']= $dataUser;
        $uri = service('uri');

        $status = "aktif" ;
        $pages = "pinjaman";

        $kirim ['asal'] = $pages;
        $kirim['status']= $status;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Pinjaman/pinjaman', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function Pinjaman_Bel(){
        // daftar anggota

        $modelAdmin = new M_Pinjaman; 
        $dataUser = $modelAdmin->getDataAnggota(['status'=>'0'])->getResultArray();
        $kirim['data_user']= $dataUser;
        $uri = service('uri');

        $status = "taktif" ;
        $pages = "pinjaman";

        $kirim ['asal'] = $pages;
        $kirim['status']= $status;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Pinjaman/pinjaman', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function D_Anggota_P(){
        $modelAdmin = new M_Pinjaman;
        $modelA = new M_Angsuran;
        $uri = service('uri');

        $pages = 'pinjaman';
        $idEdit = $uri->getSegment(4);
        $dataBuku = $modelAdmin->getDataAnggota(['sha1(id_pinjaman)' => $idEdit])->getRowArray();
        $si_id = $dataBuku['id_pinjaman'];

        $dataB = $modelA->getDataAnggota(['id_pinjaman' => $si_id])->getResultArray();



       
        $kirim ['asal'] = $pages;
        $kirim['data'] = $dataBuku;
        $kirim['data_s'] = $dataB;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Pinjaman/detail_p', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function Ubah_Status_P(){
        
        $modelAdmin = new M_Pinjaman; // inisiasi

        $uri = service('uri');
        $idHapus = $uri->getSegment(3);
        $dataEdit = $modelAdmin->getDataAnggota(['deleted' => '0', 'sha1(id_pinjaman)' => $idHapus])->getRowArray();
        $status = $dataEdit['status'];
        
        if ($status == '0'){
            $dataSimpan = [
                'status' => "1",
                'updated' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAnggota($dataSimpan, ['sha1(id_pinjaman)' => $idHapus]);
            return redirect()->to(base_url('/admin/pinjaman_bel'))->with('hasil', 'status_s');
        }elseif ($status == '1') {
            $dataSimpan = [
                'status' => "0",
                'updated' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAnggota($dataSimpan, ['sha1(id_pinjaman)' => $idHapus]);
            return redirect()->to(base_url('/admin/pinjaman_l'))->with('hasil', 'status_s');
        }
    }
    public function Angsuran(){
        
        $modelAdmin = new M_Pinjaman; //inisiasi model admin
        $dataUser = $modelAdmin->getDataAnggota(['deleted'=>'0'])->getResultArray();

        $uri = service('uri');

        $pages = 'pinjaman';

        $kirim ['asal'] = $pages;
        $kirim['data_user']= $dataUser;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/Pinjaman/angsuran', $kirim);
        echo view ('Backend/Template/fuuter');
        
    }
    public function edit_anggota_P()
    {
        
        $modelEdit = new M_Pinjaman(); // inisiasi

        $uri = service('uri');
        $page = 'pinjaman';
        $pages = $uri->getSegment(2);
        $idEdit = $uri->getSegment(3);
        $dataEdit = $modelEdit->getDataAnggota(['sha1(id_pinjaman)' => $idEdit])->getRowArray();

        session()->set(['idUpdate' => $dataEdit['id_pinjaman']]);
        $data['pages'] = $pages;
        $data['asal'] = $page;
        $data['data_edit'] = $dataEdit;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Main/Pinjaman/edit', $data);
        echo view('Backend/Template/fuuter', $data);
    }
    public function post_edit_P()
    {
        $modelSimpanan = new M_Pinjaman();

        $idUpdate = session()->get('idUpdate');
        $nama = $this->request->getPost('namaLengkap');
        $tgl = $this->request->getPost('tanggalLahir');
        $alamat = $this->request->getPost('alamat');
        $nik = $this->request->getPost('nik');
        $jk = $this->request->getPost('jenisKelamin');
        $nomor = $this->request->getPost('noTelpon');
        $email = $this->request->getPost('email');

        $dataUpdate = [
            'nama' => $nama,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'nik' => $nik,
            'jenis_kelamin' => $jk,
            'telpon' => $nomor,
            'email' => $email,
            'deleted' => '0',
            'updated' => date('Y-m-d H:i:s')
        ];
        $whereUpdate = ['id_pinjaman' => $idUpdate];

        $modelSimpanan->updateDataAnggota($dataUpdate, $whereUpdate);
        session()->remove('idUpdate');
        return redirect()->to(base_url('/admin/login'))->with('hasil', 'update_done');
    }
    Public function Bayar_Angsuran()
    {
        
        $modelEdit = new M_Angsuran(); // inisiasi

        $uri = service('uri');
        $pages = 'pinjaman';
        $idEdit = $uri->getSegment(3);
        $dataEdit = $modelEdit->getDataAnggota(['sha1(id_angsuran)' => $idEdit])->getRowArray();

        session()->set(['idUpdate' => $dataEdit['id_angsuran']]);

        $data['asal'] = $pages;
        $data['data_edit'] = $dataEdit;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Main/Pinjaman/bayar_a', $data);
        echo view('Backend/Template/fuuter', $data);
    }
    public function Post_Bayar_Angsuran(){
        $modelSimpanan = new M_Pinjaman;
        $modelWajib = new M_Angsuran;
        $idUpdate = session()->get('idUpdate');

        

        $coverBuku = $this->request->getFile('bukti_p');
        $ext1 = $coverBuku->getClientExtension();
        $namaFile1 = "BuktiW-".date("ymdHis").".".$ext1;
        $coverBuku->move('Assets/Bukti_A',$namaFile1);

        $whereUpdate = ['id_angsuran' => $idUpdate];




        $dataUpdate = [
            'bukti' => $namaFile1,
        ];



        $modelWajib->updateDataAnggota($dataUpdate, $whereUpdate);
  
        session()->remove('idUpdate');

        session()->setFlashdata('hasil','bayar');
        ?>
            <script>
                history.go(-2);
            </script>
        <?php
    }


    #akhir fitur pinjaman




    # tampilan web awal
    public function Dashboard(){
        session()->remove('error_list');

        $SimpananModel = new M_Simpanan();
        $PinjamanModel = new M_Pinjaman();

        $totalAnggotaS = $SimpananModel->getTotalAnggotaS();
        $totalSimpanan = $SimpananModel->getTotalSimpanan();

        $totalAnggotaP = $PinjamanModel->getTotalAnggotaP();
        $totalPinjaman = $PinjamanModel->getTotalPinjaman();


        $data = [
            'totalAnggotaSimpanan' => $totalAnggotaS,
            'totalAnggotaPinjaman' => $totalAnggotaP,
            'totalSimpanan' => $totalSimpanan,
            'totalPinjaman' => $totalPinjaman,
        ];
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;

        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/dashboard', $data);
        echo view ('Backend/Template/fuuter');
    }
    public function Login(){
        echo view ('Backend/Main/login');
    }
    public function Form(){
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/form');
        echo view ('Backend/Template/fuuter');
        
    }
    public function Anggota(){
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/anggota');
        echo view ('Backend/Template/fuuter');
        
    }


    public function Pembayaran(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/pembayaran');
        echo view ('Backend/Template/fuuter');
        
    }
    public function D_Anggota(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/detail');
        echo view ('Backend/Template/fuuter');
        
    }
    
    #tampilan web akhir





    public function Test()
    {
        $totalSemua = 12345; // Ganti dengan nilai yang sesuai
$cicilan = 6; // Ganti dengan nilai yang sesuai

$perCicilan = ceil($totalSemua / $cicilan);
echo "Per Cicilan: " . $perCicilan;
        // echo view('Backend/Test/Test');
    }
}
