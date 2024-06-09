<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lib.php</title>
</head>
<body>
    <?php

include 'lib/helper.php';
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'dbpwpb';

    $mysqli = mysqli_connect($host, $user, $pass, $db)
    or die ('Tidak dapat koneksi');
    $mysql = mysqli_connect($host, $user, $pass, $db)
    OR DIE ('Tidak dapat koneksi ke database');
    ?>
</body>
</html>