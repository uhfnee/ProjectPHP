<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>v_index.php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    
   
</head>
<body>
    <br><br><br>
    <center><a href="tambah.php">Tambah Data</a><br><br></center>
    <form method="GET" action="index.php">
        <center>Cari Berdasarkan:
            <select name="search_column">
                <option value="nis">NIS</option>
                <option value="nama_lengkap">Nama Lengkap</option>
                <option value="jenis_kelamin">Jenis Kelamin</option>
                <option value="kelas">Kelas</option>
                <option value="alamat">Alamat</option>
                <option value="golongan_darah">Golongan Darah</option>
                <option value="nama_ibu">Nama Ibu Kandung</option>
                <option value="id_kelas">Id Kelas</option>
                <option value="no_telp">Nomor Telepon</option>
            </select>
            <input type="text" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            <button type="submit">Cari</button>
           
            <a href="index.php" style="text-decoration: none;"><button type="button">Reset</button></a></center>
    </form><br>

    <table align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIS
                    <br><a href="index.php?sort=nis&order=asc">▲</a>
                    <a href="index.php?sort=nis&order=desc">▼</a>
                </th>
                <th>Nama Lengkap
                    <br><a href="index.php?sort=nama_lengkap&order=asc">▲</a>
                    <a href="index.php?sort=nama_lengkap&order=desc">▼</a>
                </th>
                <th>Jenis Kelamin
                    <br><a href="index.php?sort=jenis_kelamin&order=asc">▲</a>
                    <a href="index.php?sort=jenis_kelamin&order=desc">▼</a>
                </th>
                <th>Kelas
                    <br><a href="index.php?sort=kelas&order=asc">▲</a>
                    <a href="index.php?sort=kelas&order=desc">▼</a>
                </th>
                <th>Jurusan
                    <br><a href="index.php?sort=jurusan&order=asc">▲</a>
                    <a href="index.php?sort=jurusan&order=desc">▼</a>
                </th>
                <th>Alamat
                    <br> <a href="index.php?sort=alamat&order=asc">▲</a>
                    <a href="index.php?sort=alamat&order=desc">▼</a>
                </th>
                <th>Golongan Darah
                    <br><a href="index.php?sort=golongan_darah&order=asc">▲</a>
                    <a href="index.php?sort=golongan_darah&order=desc">▼</a>
                </th>
                <th>Nama Ibu Kandung
                    <br><a href="index.php?sort=nama_ibu&order=asc">▲</a>
                    <a href="index.php?sort=nama_ibu&order=desc">▼</a>
                </th>
                <th>No telepon
                    <br><a href="index.php?sort=no_telp&order=asc">▲</a>
                    <a href="index.php?sort=no_telp&order=desc">▼</a>
                </th>
                <th>Id Kelas
                    <br><a href="index.php?sort=id_kelas&order=asc">▲</a>
                    <a href="index.php?sort=id_kelas&order=desc">▼</a>
                </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <div class="data">
        <?php
            if ($listSiswa->num_rows === 0 && !empty($search_column) && !empty($search_value)) {
                echo "<center>Data Tidak Ditemukan</center>";
            }
            ?>
</div>

            <?php
            $i = 1;
            if ($listSiswa) {
                while ($siswa = $listSiswa->fetch_array()) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td>
                        <?php if (!empty($siswa['file'])) { ?>
                            <img width="90" height="90" src="<?php echo base_url() ?>/Assets/img/<?php echo $siswa['file'] ?>">
                        <?php } else { ?>
                            <img width="90" height="90" src="Assets/img/ava.png">
                        <?php } ?>
                    </td>
                    <td><?= $siswa['nis'] ?></td>
                    <td><?= $siswa['nama_lengkap'] ?></td>
                    <td><?= $siswa['jenis_kelamin'] ?></td>
                    <td><?= $siswa['kelas'] ?></td>
                    <td><?= $siswa['jurusan'] ?></td>
                    <td><?= $siswa['alamat'] ?></td>
                    <td><?= $siswa['golongan_darah'] ?></td>
                    <td><?= $siswa['nama_ibu'] ?></td>
                    <td><?= $siswa['no_telp'] ?></td>
                    <td><?= $siswa['id_kelas'] ?></td>
                    <td>
                    <a href="edit.php?nis=<?= $siswa['nis'] ?>" title="Edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a><br>
                    <a href="delete.php?nis=<?= $siswa['nis'] ?>" title="Delete" class="btnDelete btn btn-danger"><span class="bi bi-trash"></span></a>

                    </td>
                </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="bi bi-x"></i></span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnYa">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery.toast.js"></script>

    <script type="text/javascript">
            $(function() {
            $(".btnDelete").on("click", function(e){
            e.preventDefault();

            var nama = $(this).closest('tr').find('td:eq(3)').html();

            var tr = $(this).closest('tr');

            $(".modal").modal('show');
            $(".modal-title").html('Konfirmasi');
            $(".modal-body").html('Anda ingin menghapus data <b>'+ nama + '</b>')

            var href = $(this).attr('href');

            $('.btnYa').off().on('click', function(){
            $.ajax({
            'url' : href,
            'type' : 'POST',
            'success' : function(result){
                if(result == 1){
                    $(".modal").modal('hide');
                    tr.fadeOut();
                    toastr.error();('Data tidak berhasil dihapus', 'Informasi');
                }
                else{
                    $(".modal").modal('hide');
                    toastr.success('Data '+ nama + ' berhasil dihapus', 'Informasi');
                }
            }
            });
            });
            });
            });
            </script>
    <center><a href="logout.php">Logout</a><br><br><br></center>
</body>
</html>

<style>
    body {
        background-image: url(bg4.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    header {
        background-color: #24252A;
        padding: 20px 0;
        color: #fff;
        text-align: center;
    }
    .data{
    color: red;
    font-size: 20px;
    font-family: Poppins, bold;
    }
    a:hover {
        color: black;
    }

    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #9c27b0;
        color: white;
    }

    tbody tr:hover {
        background-color: #C0C0C0;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td img {
        border-radius: 50%;
        transition: transform 0.3s ease;
    }

    td img:hover {
        transform: scale(1.1);
    }

    button {
        padding: 5px 10px;
        background-color: #9c27b0;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: blueviolet;
    }

    .fa {
        transition: transform 0.3s ease;
    }
</style>