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

            <ul class="navbar-nav mr-auto">

        </div>

    </nav>

</header>

<?php
echo '<div>
<a href="panel.php" class="btn btn-primary stretched-link">Powrót</a>
</div>';


//echo"<p>Witaj ".$_SESSION['user'].' w sekcji swoich statystyk</a></p>';
echo"<p>Nazwa: ".$_SESSION['user'].'</p>';
echo"<p>E-mail: ".$_SESSION['email'].'</p>';
?>

<?php


echo '<table>';
echo '<tr>';
echo'<th colspan="3" style="text-align: center">Statystyki</th>';

echo '</tr>';
echo '<tr>';

echo'<th>Ilość zamówień</th>';
echo'<th>Ilość wprowadzonych zmian</th>';
echo '</tr>';
echo '<tr>';
echo "<td>".$_SESSION['ilosc_zamowien']."</td>";
echo "<td>".$_SESSION['zmiany']."</td>";
echo '</tr>';



?>

</body>

<footer class="fixed-bottom">


    <div class="footer text-center py-3">© 2019 E-meble
    </div>


</footer>
