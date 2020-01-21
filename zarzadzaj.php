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
    <script type="text/javascript" src="index.js"></script>


</head>
<!--style="overflow: hidden"-->
<body>
<header>

    <nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">

        <a class="navbar-brand" ><img src="img/logo.png" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> E-meble</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainmenu">

            <ul class="navbar-nav mr-auto">

            </ul>

            <form class="form-inline" >

                <input class="form-control mr-1 "  type="text" id="myinput" onkeyup="searchFunction()" placeholder="Filtruj po nazwie..." aria-label="Filtruj po nazwie...">

            </form>

        </div>

    </nav>

</header>
<div>
    <a href="panel.php" class="btn btn-primary stretched-link">Powrót</a>
</div>
<br>
<a href="dodaj.php" class="btn btn-primary stretched-link">Dodaj</a>



<div class="jumpers">
    <br>
    <table class="table table-hover"; id="mytable" align="center";>
        <thead>
        <tr>
            <th onclick="sortTable(0)"> ID</th>
            <th onclick="sortTable(1)">Nazwa produktu</th>
            <th onclick="sortTable(2)">Materiał</th>
            <th onclick="sortTable(3)">Typ</th>
            <th onclick="sortTable(4)">Cena</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "connect.php";
        include 'update.php';
        include 'delete.php';
        $conn=mysqli_connect($host,$db_user,$db_password,$db_name) or die("Błąd połączenia");
        mysqli_set_charset($conn, "utf8");
        $table  = mysqli_query($conn ,'SELECT * FROM produkt');

        while($row  = mysqli_fetch_array($table)){ ?>
            <tr id="<?php echo $row['id_prod']; ?>">
                <td data-target="id_prod"><?php echo $row['id_prod']; ?></td>
                <td data-target="nazwa_prod"><?php echo $row['nazwa_prod']; ?></td>
                <td data-target="material"><?php echo $row['material']; ?></td>
                <td data-target="typ"><?php echo $row['typ']; ?></td>
                <td data-target="cena"><?php echo $row['cena']; ?></td>
                <td><a href="#" class="btn btn-primary stretched-link" data-role="update" data-id="<?php echo $row['id_prod'] ;?>">Edytuj</a>
                    <a href="#" class="btn btn-primary stretched-ink" data-role="delete" data-id="<?php echo $row['id_prod'];?>">Usuń</a>
                </td>
            </tr>
        <?php }
        ?>

        </tbody>
    </table>


</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="Zamknij" data-dismiss="modal">&times;</button>
                <div class="container">
                    <h4 class="alert alert-info"> Edytuj produkt</h4>
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group btn-info">
                    <label>Nazwa produktu</label>
                    <input type="text" id="nazwa_prod" class="form-control">
                </div>
                <div class="form-group btn-info">
                    <label>Materiał</label>
                    <input type="text" id="material" class="form-control">
                </div>

                <div class="form-group btn-info">
                    <label>Typ</label>
                    <input type="text" id="typ" class="form-control">
                </div>
                <div class="form-group btn-info">
                    <label>Cena</label>
                    <input type="text" id="cena" class="form-control">
                </div>

                <input type="hidden" id="produktId" class="form-control">
            </div>
            <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Edytuj</a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zamknij</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal Delete -->
<div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="Zamknij" data-dismiss="modal">&times;</button>
                <div class="container">
                    <h4 class="alert alert-danger "> Czy na pewno chcesz usunąć produkt?</h4>
                </div>

                <input type="hidden" id="produktId" class="form-control">
            </div>
            <div class="modal-footer">
                <a href="zarzadzaj.php" id="delete" class="btn btn-primary pull-right">Usun</a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zamknij</button>
            </div>
        </div>

    </div>
</div>
</body>

<script>
    $(document).ready(function(){

        // dołącz wartości w polach wejściowych
        $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var nazwa_prod  = $('#'+id).children('td[data-target=nazwa_prod]').text();
            var material  = $('#'+id).children('td[data-target=material]').text();
            var typ  = $('#'+id).children('td[data-target=typ]').text();
            var cena  = $('#'+id).children('td[data-target=cena]').text();

            $('#nazwa_prod').val(nazwa_prod);
            $('#material').val(material);
            $('#typ').val(typ);
            $('#produktId').val(id);
            $('#cena').val(cena);
            $('#myModal').modal('toggle');
        });

        //teraz utwórz zdarzenie, aby uzyskać dane z pól i zaktualizować bazę danych

        $('#save').click(function(){
            var id  = $('#produktId').val();
            var nazwa_prod =  $('#nazwa_prod').val();
            var material =  $('#material').val();
            var typ =   $('#typ').val();
            var cena =   $('#cena').val();
            $.ajax({
                url      : 'update.php',
                method   : 'post',
                data     : {nazwa_prod : nazwa_prod , material: material , typ : typ , cena : cena, id_prod: id},
                success  : function(response){
                    // teraz zaktualizuj rekord użytkownika w tabeli
                    $('#'+id).children('td[data-target=nazwa_prod]').text(nazwa_prod);
                    $('#'+id).children('td[data-target=material]').text(material);
                    $('#'+id).children('td[data-target=typ]').text(typ);
                    $('#'+id).children('td[data-target=cena]').text(cena);
                    $('#myModal').modal('toggle');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function(){

        // dołącz wartości w polach wejściowych
        $(document).on('click','a[data-role=delete]',function(){
            var id  = $(this).data('id');
            var nazwa_prod  = $('#'+id).children('td[data-target=nazwa_prod]').text();
            var material  = $('#'+id).children('td[data-target=material]').text();
            var typ  = $('#'+id).children('td[data-target=typ]').text();
            var cena  = $('#'+id).children('td[data-target=cena]').text();

            $('#nazwa_prod').val(nazwa_prod);
            $('#material').val(material);
            $('#typ').val(typ);
            $('#produktId').val(id);
            $('#cena').val(cena);
            $('#myModalDelete').modal('toggle');
        });

        //teraz utwórz zdarzenie, aby uzyskać dane z pól i zaktualizować bazę danych

        $('#delete').click(function(){
            var id  = $('#produktId').val();
            var nazwa_prod =  $('#nazwa_prod').val();
            var material =  $('#material').val();
            var typ =   $('#typ').val();
            var cena =   $('#cena').val();
            $.ajax({
                url      : 'delete.php',
                method   : 'post',
                data     : {nazwa_prod : nazwa_prod , material: material , typ : typ , cena : cena, id_prod: id},
                success  : function(response){
                    // teraz zaktualizuj rekord użytkownika w tabeli
                    $('#'+id).children('td[data-target=nazwa_prod]').text(nazwa_prod);
                    $('#'+id).children('td[data-target=material]').text(material);
                    $('#'+id).children('td[data-target=typ]').text(typ);
                    $('#'+id).children('td[data-target=cena]').text(cena);
                    $('#myModalDelete').modal('toggle');
                }
            });
        });
    });
</script>






<footer class="fixed-bottom">


    <div class="footer text-center py-3">© 2019 E-meble
    </div>


</footer>
