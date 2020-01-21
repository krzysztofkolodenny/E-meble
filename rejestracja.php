<?php

    session_start();

    if (isset($_POST['email']))
    {
        //Udana walidacja
        $walidacja_ok=true;

        $imie=$_POST['imie'];
        //Sprawdzanie poprawności e-maila
        $email=$_POST['email'];
        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);

        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $walidacja_ok=false;
            $_SESSION['e_email']="<div class=\"card-body alert alert-danger\" role=\"alert\">
Podaj poprawny adres e-mail!
</div>";
        }

        //Sprawdź poprawność hasła
        $haslo1= $_POST['haslo1'];
        $haslo2= $_POST['haslo2'];

        if ((strlen($haslo1)<5) || (strlen($haslo1)>20))
        {
            $walidacja_ok=false;
            $_SESSION['e_haslo']=
                "<div class=\"d-flex alert alert-danger\" role=\"alert\">
Hasło musi posiadać od 5 do 20 znaków!
</div>";

        }

        if($haslo1!=$haslo2)
        {
            $walidacja_ok=false;
            $_SESSION['e_haslo']=

                "<div class=\"d-flex alert alert-danger\" role=\"alert\">
Podane hasła muszą być identyczne!
</div>";
        }

        //Sprawdzanie czy zaznaczono regulamin
        if (!isset($_POST['regulamin']))
        {
            $walidacja_ok=false;
            $_SESSION['e_regulamin']=  "<div class=\"d-flex alert alert-danger\" role=\"alert\">
       
Proszę zaakceptować regulamin!
</div>";

        }

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //Sprawdzanie czy email jest w bazie
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

                if (!$rezultat) throw new Exception($polaczenie->error);

                $liczba_takich_samych_emaili=$rezultat->num_rows;
                if ($liczba_takich_samych_emaili>0)
                {
                        $walidacja_ok=false;
                        $_SESSION['e_email']=
                            "<div class=\"d-flex alert alert-danger\" role=\"alert\">
                        Istnieje już konto przypisane do tego adresu e-mail
                         </div>";

                }

                if($walidacja_ok==true)
                {
                    //dodanie użytkownika do bazy

                    if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$imie','$haslo1','$email',0,0)"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: zaloguj.php');

                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                }
                $polaczenie->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style = "color:red;">Błąd serwera! Przepraszamy za usterki</span>';
            echo '<br />Kod błędu: '.$e;
        }


    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E-meble Załóż konto</title>
    <meta name="description" content="Aplikacja do zarządzania magazynem mebli">
    <meta name="keywords" content="magazyn,meble">
    <meta name="author" content="Julia Kalinowska,Krzysztof Kołodenny">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <style>
        .error
        {
            color:red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style>
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

                <li class="nav-item">
                    <a class="nav-link" href="zaloguj.php" > Zaloguj </a>

                </li>

                <li class="nav-item active">
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

<div class="wrapper">
    <br>
    <br>
    <form class="col-sm-9 col-md-7 col-lg-5 mx-auto" action="rejestracja.php" method="post">
        <h2 class="form-signin-heading">Rejestracja</h2>
        <input type="text" class="form-control" name="imie" placeholder="Imię" required="" autofocus="" />

        <br>
        <input type="text" class="form-control" name="email" placeholder="E-mail" required="" autofocus="" />
        <?php
        if (isset($_SESSION['e_email']))
        {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
        }
        ?>
        <br>
        <input type="password" class="form-control" name="haslo1" placeholder="Hasło" required=""/>
        <?php
        if (isset($_SESSION['e_haslo']))
        {
            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>
        <br>
        <input type="password" class="form-control" name="haslo2" placeholder="Powtórz hasło" required=""/>
        <label class="checkbox">
            <input type="checkbox" value="regulamin" id="regulamin" name="regulamin"> Akceptuję regulamin
        </label>
        <?php
        if (isset($_SESSION['e_regulamin']))
        {
            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>

        <!--        captcha moze byc dodana w przyszlosci-->
<!--            <div class="g-recaptcha" data-sitekey="6LeMjMMUAAAAAE2uOymrH5-9M0KJuHMrVJEe9qFW"></div>-->

        <button class="card-columns btn btn-lg btn-primary btn-block position-static" type="submit">Zarejestruj</button>
    </form>
</div>

<footer class="d-flex">
    <div class="footer fixed-bottom text-center py-3">© 2019 E-meble
    </div>
</footer>
</body>
</html>