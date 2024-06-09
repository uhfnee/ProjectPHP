<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
</head>
<body>
    <?php
    include 'lib/library.php';
    

    checkLogin();
    
    $sql = 'SELECT * FROM siswa INNER JOIN kelas ON  (siswa.id_kelas = siswa.id_kelas)';


    // Search
    $search_column = @$_GET['search_column']; 
    $search_value = @$_GET['search'];
    if (!empty($search_column) && !empty($search_value)) {
    $sql .= " WHERE $search_column LIKE '%$search_value%'";
}
    

    // Ordering
    $order_field = @$_GET['sort'];
    $order_mode = @$_GET['order'];

    if (!empty($order_field) && !empty($order_mode)) $sql .= " ORDER BY $order_field $order_mode";
    $listSiswa = $mysqli->query($sql);

   

    include 'views/v_index.php';

    ?>
</body>
</html>