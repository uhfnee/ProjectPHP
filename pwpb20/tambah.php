<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah.php</title>
</head>
<body>
<?php
include 'lib/library.php';
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
    $file = $foto['name'];

    if (empty($nis)) {
        flash('error', 'mohon masukan NIS dengan benar');
    } else if (empty($nama_lengkap)) {
        flash('error1', 'mohon masukan nama lengkap dengan benar');
    } else {
        if (!empty ($foto) and $foto['error'] == 0) {
            $path= './assets/img/';
            $upload = move_uploaded_file ($foto ['tmp_name'], $path . $foto['name']);

            if (!$upload) {
                flash('error', "Upload file gagal");
                header ('location:index.php');
            }

            $file = $foto['name'];
        }

    }

    $sql = "INSERT INTO siswa (nis, nama_lengkap, jenis_kelamin, kelas, jurusan, alamat, golongan_darah, nama_ibu, no_telp, id_kelas, file) VALUES
    ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas', '$jurusan', '$alamat', '$golongan_darah', '$nama_ibu', '$no_telp', '$id_kelas', '$file')";    

    $mysqli->query($sql) or die ($mysqli->error);
    header('location: index.php');
}
include 'views/v_tambah.php';
?>
</body>
</html>