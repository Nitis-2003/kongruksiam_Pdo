<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=employeeDB;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected Database successfully";
} catch(PDOException $e) {
  echo "Connection Database failed: " . $e->getMessage();
}
require_once'./db/controller.php';
require_once'./db/user.php';
$controller = new Controller($conn);
$user = new User($conn);
?>