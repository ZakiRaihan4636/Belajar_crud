<?php
session_start();
    
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    require 'functions.php';

   $mahasiswa =  query("SELECT * FROM mahasiswa");

//    jika tombol klik ditekan
    if(isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar Mahasiswa</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data</a><br><br>
    
    <form action="" method="post">

        <input type="text" name="keyword" placeholder="Search" size="35" autocomplete="off" autofocus>
        <button type="submit" name="cari">cari</button><br><br>

    </form>

    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    <?php $no = 1 ?>
    <?php foreach($mahasiswa as $mhs) : ?>
    
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["kelas"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td><img width="50" src="img/<?= $mhs["gambar"]; ?>" alt=""></td>
            <td>
                <a href="edit.php?id=<?= $mhs["id"]; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Apakah Anda Yakin');">Hapus</a>
            </td>
        </tr>
    <?php endforeach;  ?>
    </table>

</body>
</html>