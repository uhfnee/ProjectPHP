<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'lib/library.php';

sudahLogin();
        
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM t_login
    WHERE username = '$username'
    AND password = '$password'";

    $data = $mysql->query($sql) or die ($mysql->error);

    if ($data->num_rows != 0) {
    $row = mysqli_fetch_object ($data);
    $_SESSION['username'] = $row->username;
    $_SESSION['level'] = $row->level;
    header('location: index.php');
    } else {
        $error = "Username atau password salah";
    }
}
    include 'views/v_login.php';
?>
</body>
</html>