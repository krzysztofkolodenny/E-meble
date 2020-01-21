<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <style>
        table, th, td {
            border: 3px solid #138496;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E-meble</title>
    <meta name="description" content="Aplikacja do zarządzania magazynem mebli">
    <meta name="keywords" content="magazyn,meble">
    <meta name="author" content="Julia Kalinowska,Krzysztof Kołodenny">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>


</head>
<!--style="overflow: hidden"-->
<body >
<header>

    <nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">

        <a class="navbar-brand" ><img src="img/logo.png" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> E-meble</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainmenu">

            <ul class="navbar-nav mr-auto"></ul>

        </div>

    </nav>

</header>

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php
    echo"<strong>Witaj ".$_SESSION['user']."!</strong> Masz dostęp do systemu".'</div>';
    ?>

</div>

<a href="logout.php" class="btn btn-primary stretched-link">Wyloguj</a>
</div>


<div class="container-card row m-auto">
    <div class="card" style="width:300px">
        <img class="card-img-top" src="img/user.png" alt="Card image" style="width:100%" >
        <div class="card-body "style="background-color: #23272b">
            <h4 class="card-title">Profil</h4>
            <p class="card-text">Kliknij zobacz by przejrzeć swój profil</p>
            <a href="profil.php" class="btn btn-primary stretched-link">Zobacz</a>
        </div>
    </div>

    <pre> </pre>
    <div class="card" style="width:300px">
        <img class="card-img-top" src="img/zarzadzaj.png" alt="Card image" style="width:100%" >
        <div class="card-body "style="background-color: #23272b">
            <h4 class="card-title">Produkty</h4>
            <p class="card-text">Kliknij zarządzaj by przejść do bazy z produktami</p>
            <a href="zarzadzaj.php" class="btn btn-primary stretched-link">Zarządzaj </a>
        </div>
    </div>

</div>


<footer class="fixed-bottom">

    <div class="footer text-center py-3">© 2019 E-meble
    </div>


</footer>

</body>
</html>







