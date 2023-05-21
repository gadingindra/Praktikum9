<?php
    include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export MySQL to Excel</title>
    <style>
        body{
            font-family: sans-serif;
        }
        table{
            width: 50%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        table th, table td{
            border: 1px solid #098050;
            padding: 3px 8px;

        }
        .excel{
            background: #098050;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <a href="laporanexcel.php" class="excel" target="_blank">Print to EXCEL</a>
    <table width="100%" border="1">
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
</body>
</html>