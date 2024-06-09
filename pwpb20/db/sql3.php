<?php

session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dboptik';

$mysqli = mysqli_connect($host, $user, $pass, $db)
    or die ('Tidak dapat koneksi');

$sql = "SELECT * FROM jumlah_resep";
$result = mysqli_query($mysqli, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>NIK</th><th>No. Resep</th><th>Jumlah Resep Jenis</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["NIK"]. "</td><td>" . $row["No_resep"]. "</td><td>" . $row["jumlah_resepjenis"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan";
}

mysqli_close($mysqli);
?>
<style>
    table {
    border-collapse: collapse;
    width: auto;
    margin-bottom: 20px;
    font-size: 16px;
}
  
  table, th, td {
    border: 1px solid darkslategrey;
}

  th {
    background-color: darkgrey;
    color: #333;
 }
  
  tr:hover {
    background-color: darkslategray;
  }
  th, td {
    padding: 12px;
    text-align: left;
  }
  tr:nth-child(even) {
    background-color: darkgray;
  }
</style>