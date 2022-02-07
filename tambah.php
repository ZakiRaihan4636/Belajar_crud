<?php 
session_start();
    
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

    
    require 'functions.php';

    // Jika tombol submit di tekan
    if( isset($_POST["submit"])){

        
        // Cek apakah berhasil atau tidak
        if( tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data Berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
        }
    
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    
    <h1>Tambah data mahasiswa</h1>
    <a href="index.php">Kembali</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">

        <li>
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim">
        </li>
        <li>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas">
        </li>
        <li>
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar">
        </li>

        <li>
             <button type="submit" name="submit">Tambah</button>
        </li>

    </form>
    
</body>
</html>