<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dboptik';

$mysqli = mysqli_connect($host, $user, $pass, $db) or die ('Tidak dapat terhubung ke database');

// Periksa apakah tahun telah dipilih dan atur judul sesuai
$title = "Jumlah Pembayaran";
if (isset($_GET['year']) && !empty($_GET['year'])) {
    $year = $_GET['year'];
    if ($year == '2019') {
        $title .= " Tahun 2019";
    } elseif ($year == '2023') {
        $title .= " Tahun 2023";
    }
}

echo "<form method='GET'>
        <label for='year'>Pilih Berdasarkan Tahun:</label>
        <select name='year' id='year'>
            <option value=''>Tampilkan Semua</option>
            <option value='2019'"; if(isset($_GET['year']) && $_GET['year'] == '2019') echo " selected"; echo ">2019</option>
            <option value='2023'"; if(isset($_GET['year']) && $_GET['year'] == '2023') echo " selected"; echo ">2023</option>
        </select>
        <button type='submit'>Filter</button>
        
      </form>";

echo "<h2>$title</h2>";
echo "<table><tr><th>No.Kwintasi</th><th>Jumlah Pembayaran</th><th>Total Pembayaran</th></tr>";


$sql = "SELECT * FROM jml_pembayaran";
$result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row["No.Kwintasi"] ."</td><td>";

        // Menampilkan jumlah pembayaran sesuai dengan tahun yang dipilih
        if (isset($_GET['year']) && !empty($_GET['year'])) {
            $year = $_GET['year'];
            if ($year == '2019') {
                echo $row["Jumlah_2019"];
            } elseif ($year == '2023') {
                echo $row["Jumlah_2023"];
            }
        } else {
            // Jika tidak ada tahun yang dipilih, tampilkan total pembayaran
            echo $row["TOTAL"];
        }

        echo "</td><td>" . $row["TOTAL"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}

echo "</table>"; 

?>



<style>
/* Style untuk formulir */
form {
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

label {
    font-weight: bold;
    margin-right: 10px;
}

select, button {
    padding: 10px;
    font-size: 16px;
    border: 2px solid #4CAF50;
    border-radius: 4px;
    background-color: white;
    transition: all 0.3s ease;
}

select:focus, button:focus {
    outline: none;
    border-color: #45a049;
}

button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Style untuk tabel */
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

</style>