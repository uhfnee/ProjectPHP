<?php
// Halaman tabel pemasukan
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dboptik';

$mysqli = mysqli_connect($host, $user, $pass, $db) or die ('Tidak dapat terhubung ke database');

$sql = "SELECT * FROM jml_pemasukan";
$result = mysqli_query($mysqli, $sql);

$title = "Total Pemasukan";
if (isset($_GET['year']) && !empty($_GET['year'])) {
    $year = $_GET['year'];
    if ($year == '2023') {
        $title .= " Tahun 2023";
    } elseif ($year == '2024') {
        $title .= " Tahun 2024";
    }
}



echo "<form method='GET'>
        <label for='year'>Pilih Tahun:</label>
        <select name='year' id='year'>
            <option value=''>-- Semua --</option>
            <option value='2023'"; if(isset($_GET['year']) && $_GET['year'] == '2023') echo " selected"; echo ">2023</option>
            <option value='2024'"; if(isset($_GET['year']) && $_GET['year'] == '2024') echo " selected"; echo ">2024</option>
        </select>
        <button type='submit'>Filter</button>
      </form>";
      echo "<h2>$title</h2>";
echo "<table><tr><th>Pemasukan</th></tr>";

if(isset($_GET['year']) && !empty($_GET['year'])) {
    $year = mysqli_real_escape_string($mysqli, $_GET['year']);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . ($year == '2024' ? $row['total_2024'] : $row['total_2023']) . "</td></tr>";
    }
} else {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['total_2024'] . "</td><td>" . $row['total_2023'] . "</td></tr>";
    }
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