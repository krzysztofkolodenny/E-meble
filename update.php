<?php
$connection =mysqli_connect('localhost' , 'root' ,'' ,'magazyn');


if(isset($_POST['id_prod'])){
    $id_prod = $_POST['id_prod'];
    $nazwa_prod = $_POST['nazwa_prod'];
    $material = $_POST['material'];
    $typ = $_POST['typ'];
    $cena = $_POST['cena'];

    //  query to update data

    $result  = mysqli_query($connection , "UPDATE produkt SET nazwa_prod='$nazwa_prod' , material='$material' ,typ = '$typ' ,cena='$cena'WHERE id_prod='$id_prod'");
    if($result){
        echo 'data updated';
    }

}
?>