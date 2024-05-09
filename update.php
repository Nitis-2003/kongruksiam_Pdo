<?php
require_once('./db/connect.php');
if(isset($_POST['submit'])){
    $result = $controller->updateData($_POST['emp_id'],$_POST['fname'],$_POST['lname'],$_POST['salary'],$_POST['dept_id']);
    if($result){
        header("location: ./index.php");
    }
}
?>