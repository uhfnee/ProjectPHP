<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>v_tambah.php</title>
</head>
<body>
<?php

    $formMode = !empty($siswa) ? "edit" : "add";
    $action = $formMode == 'edit' ? 'edit.php' : 'tambah.php';
    $judul = $formMode == 'edit' ? 'Edit Data Siswa' : 'Tambah Data Siswa';
?>
<br><br><h2><?= $judul ?></h2>

    <form class="form-horizontal" action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nis">NIS</label></td>
                <td><input type="text" name="nis" id="nis" class="form-control" value="<?= !empty($siswa) ? $siswa['nis'] : '' ?>" <?= !empty($siswa) ? 'readonly' : '' ?>></td>
            </tr>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap</label></td> 
                <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= !empty($siswa) ? $siswa['nama_lengkap'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label>Jenis Kelamin</label></td>
                <td>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="L" <?= !empty($siswa) && $siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?>> Laki-Laki</label><br>
                        <label><input type="radio" name="jenis_kelamin" value="P" <?= !empty($siswa) && $siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>> Perempuan</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label for="kelas">Kelas</label></td>
                <td>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="XI-RPL-1" <?= !empty($siswa) && $siswa['kelas'] == 'XI-RPL-1' ? 'selected' : '' ?>>XI-RPL-1</option>
                        <option value="XI-RPL-2" <?= !empty($siswa) && $siswa['kelas'] == 'XI-RPL-2' ? 'selected' : '' ?>>XI-RPL-2</option>
                        <option value="XI-RPL-3" <?= !empty($siswa) && $siswa['kelas'] == 'XI-RPL-3' ? 'selected' : '' ?>>XI-RPL-3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td><input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= !empty($siswa) ? $siswa['jurusan'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" name="alamat" id="alamat" class="form-control" value="<?= !empty($siswa) ? $siswa['alamat'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="golongan_darah">Golongan Darah</label></td>
                <td><input type="text" name="golongan_darah" id="golongan_darah" class="form-control" value="<?= !empty($siswa) ? $siswa['golongan_darah'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="nama_ibu">Nama Ibu Kandung</label></td>
                <td><input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="<?= !empty($siswa) ? $siswa['nama_ibu'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="no_telp">Nomor Telepon</label></td>
                <td><input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= !empty($siswa) ? $siswa['no_telp'] : '' ?>"></td>
            </tr>
            <tr>
                <td><label for="id_kelas">Id Kelas</label></td>
                <td><input type="text" name="id_kelas" id="id_kelas" class="form-control" value="<?= !empty($siswa) ? $siswa['id_kelas'] : '' ?>"></td>
            </tr>
            <td><label for="foto">Foto</label></td>
            <td>
                <input type="file" name="foto" id="foto" class="form-control" onchange="loadFile(event)">
                <?php if ($formMode == 'edit') { ?> 
                    <img width="100" height="110" src="<?= !empty($siswa['file']) ? 'assets/img/ava.png' : $siswa['file'] ?>" id="output">
                    <input type="hidden" name="foto" value="<?= @$siswa['file'] ?>">
                <?php } else { ?>
                    <img src="assets/img/ava.png" id="output" style="width: 100px; height: 100px;">
                <?php } ?>
            </td>
        </tr>
        </table>
     <center><input type="submit" value="Simpan Data"></center><br><br>
    </form>
</body>
</html><style>
        body {
            background-image: url(bg4.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        h2 {
            color: #6f42c1;
            text-align: center;
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        table td, table th {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        table th {
            background-color: #6f42c1;
            color: #fff;
            text-align: left;
        }
        
        .form-control {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: #6f42c1;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #563d7c;
        }
        
        .radio-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        
        #output {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            margin-top: 5px;
        }
    </style>