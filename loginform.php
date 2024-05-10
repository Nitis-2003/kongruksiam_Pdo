<?php
$title = "Login";
require_once('./layout/header.php');
require_once('./db/connect.php');
require_once('./layout/nav.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password = md5($password.$username);
    
    $result = $user->getUser($username,$new_password);
    if(!$result){
        echo "<div class='container mt-3 alert alert-danger'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>";
    }else{
        $_SESSION['username']=$username;
        $_SESSION['uid']=$result['id'];
        header('location:index.php');
    }
}
?>
<body>
    <div class="container mt-3">
        <h1 class="text-center">เข้าสู่ระบบ</h1>
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div class="form-group mt-3">
                <label for="fname">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST") echo $_POST['username']; ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="lname">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <input type="submit" value="บันทึก" name="submit" class="btn btn-success mt-3">
        </form>
    </div>
</body>
</html>