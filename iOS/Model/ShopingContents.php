<?php

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
