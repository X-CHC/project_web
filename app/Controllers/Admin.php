<?php

namespace App\Controllers;

//bawah model database
use App\Models\M_Admin;
//atas model database

class Admin extends BaseController
{
    protected $helpers =['form'];
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
                    'ses_level' => $dataUser['akses_level']
                ];
                session()->set($dataSession);
                return redirect()->to(base_url('/admin/login'))->with('hasil', 'Berhasil');
            }
        }
        }

    public function post_form(){
        

        $valid = $this->request->getPost('jenisAnggota');
        if( $valid == "P"){
            $rules = [
                'namaLengkap' => ['label' => 'Nama Lengkap','rules' => 'required'],
                'tanggalLahir' => ['label' => 'Tanggal Lahir','rules' => 'required'],
                'alamat' => ['label' => 'Alamat','rules' => 'required'],
                'tanggalMasuk' => ['label' => 'Tanggal Masuk','rules' => 'required'],
                'nik' => ['label' => 'NIK','rules' => 'required|numeric'],
                'jenisKelamin' => ['label' => 'Jenis Kelamin','rules' => 'required'],
                'noTelpon' => ['label' => 'No. Telpon','rules' => 'required|numeric'],
                'email' => ['label' => 'Email','rules' => 'required'],
                'jenisAnggota' => ['label' => 'Alamat','rules' => 'required'],
                'tipePinjamanSelect' => ['label' => 'Tipe Pinjaman','rules' => 'required'],
                'totalPinjaman' => ['label' => 'Total Pinjaman','rules' => 'required'],
            ];
        } else {
            $rules = [
                'namaLengkap' => ['label' => 'Nama Lengkap','rules' => 'required'],
                'tanggalLahir' => ['label' => 'Tanggal Lahir','rules' => 'required'],
                'alamat' => ['label' => 'Alamat','rules' => 'required'],
                'tanggalMasuk' => ['label' => 'Tanggal Masuk','rules' => 'required'],
                'nik' => ['label' => 'NIK','rules' => 'required|numeric'],
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
            return redirect()->to(base_url('/admin/form'))->with('hasil', 'Berhasil');
        }
        
    }
    public function Setting(){
        if(session()->get('ses_id')==""or session()->get('ses_user')==""or session()->get('ses_level')==""){
        session()->setFlashdata('error','Shilakan Login Terlebih Dahulu!');
        ?>
        <script>
            document.location ="<?=base_url('admin/login-admin');?>";
        </script>
        <?php
        }
        else{ 
        $modelAdmin = new M_admin; //inisiasi model admin
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
    }


    public function simpan_data_admin(){
        
        $modelAdmin = new M_admin; //inisiasi model admin
        
        $nama = $this ->request->getPost('namaAdmin');
        $username = $this ->request->getPost('usernameAdmin');
        $level = $this ->request->getPost('level');

        $dataUser = $modelAdmin->getDataAdmin(['username_admin'=>'$username'])->getnumRows();    
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
        
        $modelAdmin = new M_admin; //inisiasi model admin
        $dataUser = $modelAdmin->getDataAdmin(['is_delete_admin'=>'0'])->getResultArray();
        $kirim['data_user']= $dataUser;

        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Master_Admin/input_admin');
        echo view ('Backend/Template/fuuter');  
            
    }
    



    public function Test()
    {
        echo view('Backend/Test/Test');
    }

    public function Dashboard(){
        session()->remove('error_list');
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/dashboard');
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
    public function Simpanan(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/simpanan');
        echo view ('Backend/Template/fuuter');
        
    }
    public function Angsuran(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/angsuran');
        echo view ('Backend/Template/fuuter');
        
    }

    public function Pinjaman(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/pinjaman');
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

    public function D_Anggota_2(){
        
        $uri = service('uri');

        $pages = $uri->getsegment(2);

        $kirim ['asal'] = $pages;
        echo view ('Backend/Template/header');
        echo view ('Backend/Template/sidebar', $kirim);
        echo view ('Backend/Main/detail_2');
        echo view ('Backend/Template/fuuter');
        
    }
}
