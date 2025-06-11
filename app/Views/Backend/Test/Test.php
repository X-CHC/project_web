<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .swal2-popup {
      font-size: 1rem !important;
    }
  </style>
</head>
<body>
  <button id="myButton" class="btn btn-primary">Klik Saya</button>

</body>



<script>
    document.getElementById('myButton').addEventListener('click', function() {
      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'success',
        confirmButtonText: 'Dukpatingting joss'
      });
    });
  </script>


<li class="list-group-item  <?php if($asal=='pinjaman') {echo 'active';}?>">
                <a class="d-flex justify-left bi-cash align-items-center text-decoration-none text-black" data-bs-toggle="collapse" href="#collapsePinjaman" role="button" aria-expanded="false" aria-controls="collapseExample">Pinjaman
                <i class="bi bi-chevron-down"></i>
                </a>
              <div class="collapse" id="collapsePinjaman">
              <ul class="list-group">
                <li class="list-group-item"><a href="/admin/pinjaman" class="text-decoration-none text-black" style="font-size: 0.875rem;">Anggota</a></li>
                <li class="list-group-item"><a href="/admin/angsuran" class="text-decoration-none text-black" style="font-size: 0.875rem;">Angsuran</a></li>
              </ul>
              </div>
            </li>

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
                    'total_p' => $total_p,
                    'total_a' => '0',
                    'deleted' => '0',
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                ];
    
                $modelAdmin->saveDataAnggota($dataSimpan);
                return redirect()->to(base_url('/admin/form'))->with('hasil', 'Berhasil');



                $hasil = $modelAdmin->autoNumber()->getRowArray();
                if (!$hasil) {
                    $id = "SPN001";
                } else {
                    $kode = $hasil['id_pinjaman'];
                    $noUrut = (int)substr($kode, -3);
                    $noUrut++;
                    $id = "SPN" . sprintf("%03s", $noUrut);
                }


                $modelAdmin = new M_Simpanan; 


                $coverBuku = $this->request->getFile('cover_buku');
                $ext1 = $coverBuku->getClientExtension();
                $namaFile1 = "Cover-Buku-".date("ymdHis").".".$ext1;
                $coverBuku->move('Assets/Cover_buku',$namaFile1);



                <label for="bukti" class="form-label" id="atasBukti" style="display: none;">Bukti Simpanan Pokok</label>
                <input type="file" class="form-control mb-3" id="bawahBukti" name="bukti_p" style="display: none;">














                <table class="table table-white">
                      <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $data['nama'];?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td><?= $data['tgl_lahir']?></td>
                        </tr>
                        <tr>
                          <td>Tempat Tinggal</td>
                          <td><?= $data['alamat']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Masuk</td>
                          <td><?= $data['created']?></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td><?= $data['status']?></td>
                        </tr>
                        <tr>
                          <td>Kode Anggota</td>
                          <td><?= $data['id_pinjaman']?></td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td><?= $data['jenis_kelamin']?></td>
                        </tr>
                        <tr>
                          <td>No. Telpon</td>
                          <td><?= $data['telpon']?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><?= $data['email']?></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><?= $data['nik']?></td>
                        </tr>
                        <tr>
                          <td>Total Pinjaman</td>
                          <td><?= $data['total_p']?></td>
                        </tr>
                        <tr>
                          <td>Total Angsuran</td>
                          <td><?= $data['total_a']?></td>
                        </tr>
                      </tbody>
                    </table>