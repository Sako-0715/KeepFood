<?php
class ShopingInsert
{
   public function runApi($row){

    $id = $row['ID'];
    $janl =  $row['Janl'];
    $price = $row['Price'];
    $prodact =  $row['Prodact'];
    $date = $row['date'];


    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
    $sql = "INSERT INTO SHOPING_CONTENTS (ID,JANL,PRICE,PRODACTNAME,DATE) VALUES ('$id','$janl','$price','$prodact','$date')";
    $db->query($sql);
    
}


}
