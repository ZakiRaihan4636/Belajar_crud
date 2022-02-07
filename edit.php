<?php 
session_start();
    
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

    require 'functions.php';   

    $id = $_GET["id"];

    $mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];


    // Jika tombol submit di tekan
    if( isset($_POST["ubah"])){
        
        // Cek apakah berhasil atau tidak
        if( ubah($_POST) > 0){
            echo "
                <script>
                    alert('Data Berhasil di ubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data gagal di ubah');
                document.location.href = 'edit.php';
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
    <title>Ubah data mahasiswa</title>
</head>
<body>
    
    <h1>Ubah data mahasiswa</h1>
    <a href="index.php">Kembali</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" id="id" value="<?= $mhs["id"]?>">
        <input type="hidden" name="gambarLama" id="id" value="<?= $mhs["gambar"]?>">
        <li>
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" value="<?= $mhs["nim"]?>">
        </li>
        <li>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]?>">
        </li>
        <li>
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" value="<?= $mhs["kelas"]?>">
        </li>
        <li>
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]?>">
        </li>
        <li>
            <label for="gambar">Gambar :</label><br>
            <img src="img/<?= $mhs['gambar']?>" width="50" height="50" alt=""><br>
            <input type="file" name="gambar" id="gambar">
        </li>

        <li>
             <button type="submit" name="ubah">Ubah data</button>
        </li>

    </form>
    
</body>
</html>