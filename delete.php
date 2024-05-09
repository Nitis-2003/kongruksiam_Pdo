<?php
require_once'./db/connect.php';
if(!isset($_GET['id'])){
    header("location: ./index.php");
}else{
    $controller->delete($_GET['id']);
    header("location: ./index.php");
}
?>