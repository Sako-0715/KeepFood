<?php
require_once dirname(__FILE__). '/ShopingInsert.php';


$row = $_POST;
$shopinginsert = new ShopingInsert();
$shopinginsert->runApi($row);