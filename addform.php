<?php
$title = "Insert Data";
require_once('./layout/header.php');
require_once('./layout/nav.php');
require_once('./db/connect.php');
$result = $controller->getDepartments();
?>
<body>
    <?php require_once('./layout/nav.php'); ?>
    <div class="container mt-3">
        <?php
            if(isset($_POST["submit"])){
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $salary=$_POST["salary"];
                $dept_id=$_POST["dept_id"];
                $status = $controller->insert($fname,$lname,$salary,$dept_id);
                if($status){
                    $message = "บันทึกข้อมูลสำเร็จ";
                    require_once('./layout/success_message.php');
                }else{
                    $message = "เกิดข้อผิดพลาด บันทึกข้อมูลไม่สำเร็จ";
                    require_once('./layout/error_message.php');
                }
            }
        ?>
        <h1 class="text-center">เพิ่มข้อมูล</h1>
        <form method="POST" action="addform.php">
            <div class="form-group mt-3">
                <label for="fname">ชื่อ</label>
                <input type="text" name="fname" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="lname">นามสกุล</label>
                <input type="text" name="lname" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="salary">เงินเดือน</label>
                <input type="text" name="salary" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="dept">แผนก</label>
                <select name="dept_id" class="form-control">
                    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="บันทึก" name="submit" class="btn btn-success mt-3">
            <input type="reset" value="รีเซ็ต" class="btn btn-danger mt-3">
        </form>
    </div>
</body>
</html>