<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Document</title>
    <style>

        a {
            text-decoration: none;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom right, white, blue);
        }

        .kotak {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.322);
            padding: 30px;
            border-radius: 10px
        }

        .kotak a {
            display: inline-block;
            padding: 50px;
            margin: 0 5px 0 5px;
            color: black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.452);
            border-radius: 5px;
            transition: .3s all ease;
        }

        .kotak a:hover {
            background-color: blue;
            color: white
        }
    </style>
</head>
<body>
    

    <div class="kotak">
        <h2 class="text-center mb-2">Pilih Login</h2>
        <a href="/loginAdmin" class="kotak1">Admin</a>
        <a href="/siswaLogin" class="kotak2">Siswa</a>
    </div>


</body>
</html>