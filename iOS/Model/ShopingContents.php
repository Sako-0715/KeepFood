<?php
class ShopingContents
{

    public function insertShopdata($row)
    {
        $id = $row['ID'];
        $janl =  $row['Janl'];
        $price = $row['Price'];
        $prodact =  $row['Prodact'];
        $date = $row['date'];
        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $sql = "INSERT INTO SHOPING_CONTENTS (ID,JANL,PRICE,PRODACTNAME,DATE) VALUES ('$id','$janl','$price','$prodact','$date')";
        $db->query($sql);
    }
    public function getShopdata()
    {

        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $sql = "SELECT * FROM SHOPING_CONTENTS";
        $result = $db->query($sql);

        $dataArray = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row['PRICE'] = intval($row['PRICE']);
                $dataArray[] = $row;
            }
            $js = json_encode($dataArray);
            error_log(print_r($js, true));
            echo $js;
        } else {
            error_log("クエリ実行エラー: " . $db->error);
        }

        $db->close();
    }
}
