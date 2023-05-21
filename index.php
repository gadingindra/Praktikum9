<?php
    include ('db_pd.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Data Peserta Didik</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Peserta Didik
                            <a href="excel_pd.php" class="btn btn-primary float-end" target="_blank">Print to EXCEL</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                                $query = "select 
                                r.id_registrasi, 
                                jp.keterangan_pendaftaran as jenis_pendaftaran,
                                r.tgl_masuk_sekolah, r.nis, r.no_peserta_ujian, 
                                p.keterangan as pernah_paud,
                                t.keterangan as pernah_tk,
                                r.no_skhun, r.no_ijazah,
                                h.nama_hobi as hobi,
                                c.nama_cita as cita_cita,
                                s.id_siswa, s.nama_lengkap,
                                jk.nama_jenis_kelamin as jenis_kelamin,
                                s.nisn, s.nik, s.tempat_lahir, s.tgl_lahir,
                                ag.nama_agama as agama,
                                kk.nama_kebutuhan_khusus as berkebutuhan_khusus,
                                al.alamat_jalan, al.rt_rw, al.dusun, al.kelurahan_desa, al.kecamatan, al.kode_pos,
                                tt.nama_tempat_tinggal as tempat_tinggal,
                                mt.nama_moda_transportasi as moda_transportasi,
                                s.no_hp, s.email,
                                kkpk.keterangan as penerima_kkpk,
                                s.no_kps_kks_pkh_kip,
                                k.keterangan as kewarganegaraan,
                                oa.nama_ayah, oa.tahun_lahir,
                                pd.nama_pendidikan_ortu as pendidikan_ayah,
                                pk.nama_pekerjaan_ortu as pekerjaan_ayah,
                                pg.jumlah_penghasilan_ortu as penghasilan_ayah,
                                kk2.nama_kebutuhan_khusus as difabel_ayah,
                                oi.nama_ibu, oi.tahun_lahir,
                                pd2.nama_pendidikan_ortu as pendidikan_ibu,
                                pk2.nama_pekerjaan_ortu as pekerjaan_ibu,
                                pg2.jumlah_penghasilan_ortu as penghasilan_ibu,
                                kk3.nama_kebutuhan_khusus as difabel_ibu
                                from registrasi r 
                                join jenis_pendaftaran jp on r.id_pendaftaran = jp.id_pendaftaran 
                                join paud p on r.kode_paud = p.kode_paud 
                                join tk t on r.kode_tk = t.kode_tk 
                                join hobi h on r.id_hobi = h.id_hobi 
                                join cita c on r.id_cita = c.id_cita 
                                join siswa s on r.id_siswa = s.id_siswa 
                                join jenis_kelamin jk on s.kode_jenis_kelamin = jk.kode_jenis_kelamin 
                                join agama ag on s.id_agama = ag.id_agama 
                                join kebutuhan_khusus kk on s.id_kebutuhan_khusus = kk.id_kebutuhan_khusus 
                                join alamat al on s.id_alamat = al.id_alamat 
                                join tempat_tinggal tt on s.id_tempat_tinggal = tt.id_tempat_tinggal 
                                join moda_transportasi mt on s.id_moda_transportasi = mt.id_moda_transportasi 
                                join kps_kks_pkh_kip kkpk on s.kode_kps_kks_pkh_kip = kkpk.kode_kps_kks_pkh_kip 
                                join kewarganegaraan k on s.kode_kewarganegaraan = k.kode_kewarganegaraan
                                join ortu_ayah oa on s.id_siswa = oa.id_siswa 
                                join pendidikan_ortu pd on oa.id_pendidikan_ortu = pd.id_pendidikan_ortu  
                                join pekerjaan_ortu pk on oa.id_pekerjaan_ortu = pk.id_pekerjaan_ortu 
                                join penghasilan_ortu pg on oa.id_penghasilan_ortu = pg.id_penghasilan_ortu  
                                join kebutuhan_khusus kk2 on oa.id_kebutuhan_khusus = kk2.id_kebutuhan_khusus  
                                join ortu_ibu oi on s.id_siswa = oi.id_siswa 
                                join pendidikan_ortu pd2 on oi.id_pendidikan_ortu = pd2.id_pendidikan_ortu  
                                join pekerjaan_ortu pk2 on oi.id_pekerjaan_ortu = pk2.id_pekerjaan_ortu 
                                join penghasilan_ortu pg2 on oi.id_penghasilan_ortu = pg2.id_penghasilan_ortu  
                                join kebutuhan_khusus kk3 on oi.id_kebutuhan_khusus = kk3.id_kebutuhan_khusus;";
                                $query_run = mysqli_query($koneksi, $query);
                                

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $peserta_didik = mysqli_fetch_array($query_run);
                        ?>
                                    <div class="mb-3">
                                        <label>Jenis Pendaftaran</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['jenis_pendaftaran'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Tanggal Masuk Sekolah</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['tgl_masuk_sekolah'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>NIS</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nis'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Peserta Ujian</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['no_peserta_ujian'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. SKHUN</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['no_skhun'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Ijazah</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['no_ijazah'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Peserta Didik</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nama_lengkap'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>NISN</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nisn'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nik'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Ayah Kandung</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nama_ayah'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Ibu Kandung</label>
                                        <p class="form-control">
                                            <?=$peserta_didik['nama_ibu'];?>
                                        </p>
                                    </div>
                                <?php
                                }
                                else
                                {
                                    echo "<h4>Data Tidak Ditemukan</h4>";
                                }
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>