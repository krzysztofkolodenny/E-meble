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

                if ($polaczenie->query("DELETE from produkt WHERE id_prod='$id_prod'"))
                {
                    $_SESSION['udanedodanie']=true;
                    header('Location: usun.php');

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
        echo '<span style = "color:red;">Błąd</span>';
        //echo '<br />Kod błędu: '.$e;
    }

}

?>



