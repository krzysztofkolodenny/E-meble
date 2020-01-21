<?php
$connection =mysqli_connect('localhost' , 'root' ,'' ,'magazyn');


if(isset($_POST['id_prod'])){
    $id_prod = $_POST['id_prod'];
    $nazwa_prod = $_POST['nazwa_prod'];
    $material = $_POST['material'];
    $typ = $_POST['typ'];
    $cena = $_POST['cena'];

    //  query to update data

    $result  = mysqli_query($connection , "DELETE from produkt WHERE id_prod='$id_prod'");
    if($result){
        echo 'data updated';
    }

}
?>


