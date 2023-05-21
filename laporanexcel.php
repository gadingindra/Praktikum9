<?php
    include ('koneksi.php');

    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>

<h3>Data Mahasiswa</h3>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>NAMA MAHASISWA</th>
        <th>JENIS KELAMIN</th>
        <th>JURUSAN</th>
        <th>ALAMAT</th>
    </tr>
    <?php
        $data = mysqli_query($koneksi, "select nim, nama, jenis_kelamin, jurusan, alamat from mahasiswa");
        while($dt = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $dt['nim']; ?></td>
        <td><?php echo $dt['nama']; ?></td>
        <td><?php echo $dt['jenis_kelamin']; ?></td>
        <td><?php echo $dt['jurusan']; ?></td>
        <td><?php echo $dt['alamat']; ?></td>
    </tr>
    <?php
        }
    ?>
</table>