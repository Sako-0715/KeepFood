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
        $sql = "INSERT INTO SHOPING_CONTENTS ";
        $sql .= "(ID,JANL,PRICE,PRODACTNAME,DATE) ";
        $sql .= "VALUES ";
        $sql .= "('$id','$janl','$price','$prodact','$date')";
        $db->query($sql);
    }

    /* 投稿履歴を全て取得する
    */
    public function getShopdata()
    {
        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $sql = "SELECT ID,JANL,PRICE,PRODACTNAME,DATE FROM SHOPING_CONTENTS";
        $result = $db->query($sql);

        $dataArray = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row['PRICE'] = intval($row['PRICE']);
                $dataArray[] = $row;
            }
            $js = json_encode($dataArray);
            echo $js;
        } else {
            error_log("クエリ実行エラー: " . $db->error);
        }

        $db->close();
    }

    /* ジャンルごとで全て取得する
    * $janl String  
    */
    public function getJanlShopdata($janl)
    {

        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $sql = "SELECT ID,JANL,PRICE,DATE FROM SHOPING_CONTENTS ";
        $sql .= "WHERE JANL = ";
        $sql .= "$janl";
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
