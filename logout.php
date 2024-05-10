<?php
require_once'./layout/session.php';
session_destroy();
header('location:loginform.php');
?>