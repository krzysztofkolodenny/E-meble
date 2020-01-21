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
<style>
    body{
        background-size: auto;
        margin-top: 100px; /*odstęp od navbar*/
        margin-bottom: 100px; /*odstęp od stopki*/

    }


</style>
<header>

    <nav class="navbar navbar-dark bg-jumpers_kontakt_pomoc navbar-expand-lg ">

        <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> E-meble</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainmenu">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php"> Start </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="zaloguj.php"> Zaloguj </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rejestracja.php"> Załóż konto </a>
                </li>

                <li class="nav-item active">
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

<section class="jumpers">

    <div class="container">

        <header>

            <h1>Dowiedz się więcej!</h1>

        </header>

        <div class="left">


            <h3><p style="text-align: left"> Czym są <b>E-meble</b>?</p></h3>

            <p style="text-align: left">Portal E-meble służy do zarządzania magazynami, które przechowują meble. Aplikacja jest skierowana
            głównie do pracowników magazynów. Dzięki niej, po założeniu konta, można w prosty sposób zarządzać produktami, które
            znajdują się w magazynie.</p>
            <br>
            <p style="text-align: left">Aby założyć konto należy wybrać z menu opcję <b>"Załóż konto"</b>, a następnie wypełnić formularz:</p>
            <img src="img\rejestracja.png" style="max-width: 100%"alt="rejestracja">
            <br>
            <br>
            <p style="text-align: left"><b>WAŻNE!</b> Aby rejestracja przebiegła pomyślnie należy wprowadzić hasło, które zawiera od 5 do 20 znaków
            oraz zaakceptować regulamin poprzez zaznaczenie checkbox'a.</p>

            <p style="text-align: left">Po pomyślnym założeniu konta należy przejść do zakładki <b>"Zaloguj"</b> i wpisać dane, które zostały
            wprowadzone w formularzu rejestracji (gdzie nazwa użytkownika to podane imię przy rejestracji).</p>
            <img src="img\logowanie.png" style="max-width: 100%"alt="logowanie">
            <br>
            <br>
            <p style="text-align: left">Po zalogowaniu ukaże się panel użytkownika zawierający dwie sekcje: <b>"Profil"</b> oraz <b>"Produkty"</b>.
            W sekcji Profil znajdują się statystyki aktualnie zalogowanego użytkownika natomiast za pomocą sekcji Produkty można zarządzać produktami.</p>
            <img src="img\panel.png" style="max-width: 100%"alt="panel">
            <br>
            <br>
            <br>
            <br>
            
        <footer class="fixed-bottom">

            <div class="footer text-center py-3">© 2019 E-meble
            </div>

        </footer>


</body>
</html>