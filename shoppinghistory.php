<?php
    // $db = new mysqli('localhost:8889','root','root','mydb');
    // if($db) {
    //     error_log("成功");
    // } else {
    //     error_log("失敗");
    // }
    
    // $sql = "SELECT * FROM SHOPING_CONTENTS";
    // $row = $db->query($sql);
    // $dataArray = [];

    // foreach($row as $janlHistory) {
    //     $dataArray = $janlHistory;
    // }

    // $js = json_encode($dataArray);

    // echo $js;

    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
if ($db->connect_error) {
    error_log("接続失敗: " . $db->connect_error);
} else {
    error_log("接続成功");
}

$sql = "SELECT * FROM SHOPING_CONTENTS";
$result = $db->query($sql);

$dataArray = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $row['PRICE'] = intval($row['PRICE']);
        $dataArray[] = $row;
    }
    $js = json_encode($dataArray);
    error_log(print_r($js,true));
    echo $js;
} else {
    error_log("クエリ実行エラー: " . $db->error);
}

$db->close();