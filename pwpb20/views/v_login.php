<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>v_login</title>
</head>
<body>
<form class="form-horizontal" action="login.php" method="POST">
    <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
    <input type="text" name="username" class="form-control" />
</div>
</div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="password" name="password" class="form-control" />
</div>
</div>
    <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-6">
    <button type="submit" class="btn btn-primary">Login</button>
</div>
</div>
</form>
<style>

        body {
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif; /* jenis font */
            margin: 0;
            padding: 0;
            justify-content: center;
        }
        
        .form-horizontal {
            background-color: #fff;
            width: 300px; 
            margin: 50px auto; /* jarak dari tepi layar */
            
            padding: 20px; /* jarak antara elemen dalam form */
            border-radius: 10px; /* membuat sudut form menjadi lebih bulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* bayangan untuk efek 3D */
        }
        
        .form-group {
            margin-bottom: 20px; /* jarak antara setiap grup elemen */
        }
        
        .control-label {
            font-weight: bold; /* tebal pada label */
            color: #6c757d; /* warna label */
        }
        
        .form-control {
            width: 100%; /* lebar input */
            padding: 10px; /* jarak antara input dan batas input */
            border: 1px solid #ddd; /* border input */
            border-radius: 5px; /* membuat sudut input menjadi lebih bulat */
            box-sizing: border-box; /* mengatur box-sizing agar border tidak menambah lebar input */
        }
        
        .btn-primary {
            background-color: #6f42c1; /* warna tombol */
            color: #fff; /* warna teks tombol */
            padding: 10px 20px; /* jarak antara teks tombol dan batas tombol */
            border: none; /* menghilangkan border tombol */
            border-radius: 5px; /* membuat sudut tombol menjadi lebih bulat */
            cursor: pointer; /* kursor menjadi pointer ketika diarahkan ke tombol */
            transition: background-color 0.3s; /* efek transisi perubahan warna saat dihover */
        }
        
        .btn-primary:hover {
            background-color: #563d7c; /* warna tombol saat dihover */
        }
    </style>
</body>
</html>