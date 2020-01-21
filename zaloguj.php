<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    echo '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Your message has been sent successfully.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>

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



</head>

<body>

<header>

    <nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">

        <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> E-meble</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainmenu">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php"> Start </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="zaloguj.php" > Zaloguj </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rejestracja.php"> Załóż konto </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pomoc.php"> Pomoc </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php"> Kontakt </a>
                </li>

            </ul>

            <form class="form-inline">

                <input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
                <button class="btn btn-light" type="submit">Znajdź</button>

            </form>

        </div>

    </nav>

</header>



<?php
if(isset($_SESSION['blad']))
    echo $_SESSION['blad'];

?>



<div class="wrapper">
        <br>
    <br>
    <form class="col-sm-9 col-md-7 col-lg-5 mx-auto" action="logowanie.php" method="post">
        <h2 class="form-signin-heading">Logowanie</h2>
        <input type="text" class="form-control" name="login" placeholder="Nazwa użytkownika" required="" autofocus="" />
        <br>
        <input type="password" class="form-control" name="haslo" placeholder="Hasło" required=""/>
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Pamiętaj hasło
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    </form>
</div>
<footer class="fixed-bottom">
    <div class="footer text-center py-3">© 2019 E-meble
    </div>
</footer>
</body>
</html>