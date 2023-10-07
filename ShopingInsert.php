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
    // if ($db->connect_error) {
    //     error_log("接続失敗: " . $db->connect_error);
    // } else {
    //     error_log("接続成功");
    // }

    $sql = "INSERT INTO SHOPING_CONTENTS (ID,JANL,PRICE,PRODACTNAME,DATE) VALUES ('$id','$janl','$price','$prodact','$date')";
    $db->query($sql);
    
}


}
