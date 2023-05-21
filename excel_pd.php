<?php
    include ('db_pd.php');

    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Peserta Didik.xls");
?>

<h3>Data Peserta Didik</h3>
<table border="1">
    <tr>
        <th>Jenis Pendaftaran</th>
        <th>Tgl Masuk Sekolah</th>
        <th>NIS</th>
        <th>No. Peserta Ujian</th>
        <th>Pernah PAUD</th>
        <th>Pernah TK</th>
        <th>No. SKHUN</th>
        <th>No. Ijazah</th>
        <th>Hobi</th>
        <th>Cita-cita</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>NISN</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Kebutuhan Khusus</th>
        <th>Alamat Jalan</th>
        <th>RT/RW</th>
        <th>Dusun</th>
        <th>Kelurahan/Desa</th>
        <th>Kecamatan</th>
        <th>Kode Pos</th>
        <th>Tempat Tinggal</th>
        <th>Moda Transportasi</th>
        <th>No. HP</th>
        <th>E-mail</th>
        <th>Penerima KKPK</th>
        <th>No. KKPK</th>
        <th>Kewarganegaraan</th>
        <th>Nama Ayah</th>
        <th>Tahun Lahir Ayah</th>
        <th>Pendidikan Ayah</th>
        <th>Pekerjaan Ayah</th>
        <th>Penghasilan Ayah</th>
        <th>Difabel Ayah</th>
        <th>Nama Ibu</th>
        <th>Tahun Lahir Ibu</th>
        <th>Pendidikan Ibu</th>
        <th>Pekerjaan Ibu</th>
        <th>Penghasilan Ibu</th>
        <th>Difabel Ibu</th>
    </tr>
    <?php
        $data = mysqli_query($koneksi, "select
        jp.keterangan_pendaftaran as jenis_pendaftaran,
        r.tgl_masuk_sekolah, r.nis, r.no_peserta_ujian, 
        p.keterangan as pernah_paud,
        t.keterangan as pernah_tk,
        r.no_skhun, r.no_ijazah,
        h.nama_hobi as hobi,
        c.nama_cita as cita_cita,
        s.nama_lengkap,
        jk.nama_jenis_kelamin as jenis_kelamin,
        s.nisn, s.nik, s.tempat_lahir, s.tgl_lahir,
        ag.nama_agama as agama,
        kk.nama_kebutuhan_khusus as berkebutuhan_khusus,
        al.alamat_jalan, al.rt_rw, al.dusun, al.kelurahan_desa, al.kecamatan, al.kode_pos,
        tt.nama_tempat_tinggal as tempat_tinggal,
        mt.nama_moda_transportasi as moda_transportasi,
        s.no_hp, s.email,
        kkpk.keterangan as penerima_kkpk,
        s.no_kps_kks_pkh_kip as no_kkpk,
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
        join kebutuhan_khusus kk3 on oi.id_kebutuhan_khusus = kk3.id_kebutuhan_khusus; ");
        while($dt = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $dt['jenis_pendaftaran']; ?></td>
        <td><?php echo $dt['tgl_masuk_sekolah']; ?></td>
        <td><?php echo $dt['nis']; ?></td>
        <td><?php echo $dt['no_peserta_ujian']; ?></td>
        <td><?php echo $dt['pernah_paud']; ?></td>
        <td><?php echo $dt['pernah_tk']; ?></td>
        <td><?php echo $dt['no_skhun']; ?></td>
        <td><?php echo $dt['no_ijazah']; ?></td>
        <td><?php echo $dt['hobi']; ?></td>
        <td><?php echo $dt['cita_cita']; ?></td>

        <td><?php echo $dt['nama_lengkap']; ?></td>
        <td><?php echo $dt['jenis_kelamin']; ?></td>
        <td><?php echo $dt['nisn']; ?></td>
        <td><?php echo $dt['nik']; ?></td>
        <td><?php echo $dt['tempat_lahir']; ?></td>
        <td><?php echo $dt['tgl_lahir']; ?></td>
        <td><?php echo $dt['agama']; ?></td>
        <td><?php echo $dt['berkebutuhan_khusus']; ?></td>

        <td><?php echo $dt['alamat_jalan']; ?></td>
        <td><?php echo $dt['rt_rw']; ?></td>
        <td><?php echo $dt['dusun']; ?></td>
        <td><?php echo $dt['kelurahan_desa']; ?></td>
        <td><?php echo $dt['kecamatan']; ?></td>
        <td><?php echo $dt['kode_pos']; ?></td>
        <td><?php echo $dt['tempat_tinggal']; ?></td>
        <td><?php echo $dt['moda_transportasi']; ?></td>
        <td><?php echo $dt['no_hp']; ?></td>
        <td><?php echo $dt['email']; ?></td>
        <td><?php echo $dt['penerima_kkpk']; ?></td>
        <td><?php echo $dt['no_kkpk']; ?></td>
        <td><?php echo $dt['kewarganegaraan']; ?></td>

        <td><?php echo $dt['nama_ayah']; ?></td>
        <td><?php echo $dt['tahun_lahir']; ?></td>
        <td><?php echo $dt['pendidikan_ayah']; ?></td>
        <td><?php echo $dt['pekerjaan_ayah']; ?></td>
        <td><?php echo $dt['penghasilan_ayah']; ?></td>
        <td><?php echo $dt['difabel_ayah']; ?></td>

        <td><?php echo $dt['nama_ibu']; ?></td>
        <td><?php echo $dt['tahun_lahir']; ?></td>
        <td><?php echo $dt['pendidikan_ibu']; ?></td>
        <td><?php echo $dt['pekerjaan_ibu']; ?></td>
        <td><?php echo $dt['penghasilan_ibu']; ?></td>
        <td><?php echo $dt['difabel_ibu']; ?></td>
    </tr>
    <?php
        }
    ?>
</table>