

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

            </ul>

            <form class="form-inline">

                <input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
                <button class="btn btn-light" type="submit">Znajdź</button>

            </form>

        </div>

    </nav>

</header>
<div>
    <a href="zarzadzaj.php" class="btn btn-primary stretched-link">Powrót</a>
</div>
<?php

session_start();

if (isset($_POST['nazwa_prod']))
{
    $walidacja_ok=true;

    $id_prod=$_POST['id_prod'];
    $nazwa_prod=$_POST['nazwa_prod'];
    $material=$_POST['material'];
    $typ=$_POST['typ'];
    $cena=$_POST['cena'];



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

            if($walidacja_ok==true)
            {
                //dodanie użytkownika do bazy

                if ($polaczenie->query("INSERT INTO produkt VALUES ($id_prod,'$nazwa_prod','$material','$typ','$cena')"))
                {
                    $_SESSION['udanedodanie']=true;
                    header('Location: dodaj.php');

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
        echo'<br>';
        echo '<a href="#" class="alert alert-danger"> Produkt o podanym ID istnieje </a>';
        //echo '<br />Kod błędu: '.$e;
    }

}

?>
<div class="wrapper">
    <br>
    <br>
    <form class="col-sm-9 col-md-7 col-lg-5 mx-auto" action="dodaj.php" method="post">
        <h2 class="form-signin-heading">Dodaj produkt</h2>
        <input type="number" class="form-control" name="id_prod" placeholder="ID produktu" required="" autofocus="" />
        <br>
        <input type="text" class="form-control" name="nazwa_prod" placeholder="Nazwa produktu" required="" />
        <br>
        <input type="text" class="form-control" name="material" placeholder="Materiał" required="" autofocus="" />
        <br>
        <input type="text" class="form-control" name="typ" placeholder="Typ" required=""/>

        <br>
        <input type="number" class="form-control" name="cena" placeholder="Cena" required=""/>
        <br>

        <button class="card-columns btn btn-lg btn-primary btn-block position-static" type="submit">Dodaj produkt</button>


    </form>
</div>


<br>
<br>
<footer class="d-flex">
    <div class="footer fixed-bottom text-center py-3">© 2019 E-meble
    </div>
</footer>


</body>
</html>