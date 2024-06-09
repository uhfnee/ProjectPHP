<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit.php</title>
</head>
<body>
<?php
include 'lib/library.php';

$nis = $_GET['nis'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $golongan_darah = $_POST['golongan_darah'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_telp = $_POST['no_telp'];
    $id_kelas = $_POST['id_kelas'];
    $foto = @$_FILES['foto'];
        $file = $_POST['foto'];

        if (!empty ($foto) && $foto['error'] == 0) {
            $path= './Assets/img/';
            $upload = move_uploaded_file ($foto ['tmp_name'], $path . $foto['name']);

            if (!$upload) {
                flash('error', "Upload file gagal");
                header ('location:index.php');
            }
            $file = $foto['name'];
        }


    $sql = "UPDATE siswa SET nis = '$nis',
                        nama_lengkap = '$nama_lengkap',
                        jenis_kelamin = '$jenis_kelamin',
                        kelas = '$kelas',
                        jurusan = '$jurusan',
                        alamat = '$alamat',  
                        golongan_darah = '$golongan_darah',  
                        nama_ibu = '$nama_ibu',
                        no_telp = '$no_telp',
                        id_kelas = '$id_kelas',
                        file = '$file' 
        WHERE nis = '$nis' ";


    $mysqli->query($sql) or die($mysqli->error);
    header('location: index.php');
    }
    
    
    if (empty($nis)) header('Location: index.php');
       
    
    $sql = "SELECT * FROM siswa WHERE nis = '$nis'";
    $query = $mysqli->query($sql);
    $siswa = $query->fetch_array();
    
    if (empty($siswa)) header('Location: index.php');
    
    
    include 'views/v_tambah.php';
    ?>

</body>
</html>