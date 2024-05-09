<?php
require_once './db/connect.php';
$result = $controller->getDepartments();

if(!isset($_GET['id'])){
    header("location: ./index.php");
}else{
    $id = $_GET['id'];
    $empData = $controller->getDataEmployees($id);
}
$title = "Edit Data";
require_once('./layout/header.php');   
require_once('./layout/nav.php');   
?>

<div class="container mt-3">
    <h1 class="text-center">แก้ไขข้อมูล</h1>
    <form method="POST" action="./update.php">
        <input type="hidden" name="emp_id" value="<?php echo $empData['emp_id']; ?>">
        <div class="form-group mt-3">
            <label for="fname">ชื่อ</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $empData['fname'] ?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $empData['lname']?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="salary">เงินเดือน</label>
            <input type="text" name="salary" class="form-control" value="<?php echo $empData['salary']?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="dept">แผนก</label>
            <select name="dept_id" class="form-control">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['department_id']; ?>"<?php echo ($row['department_id']==$empData['department_id'])? 'selected':''; ?>><?php echo $row['department_name']; ?></option>
                
                    <?php } ?>
            </select>
        </div>
        <input type="submit" value="บันทึก" name="submit" class="btn btn-success mt-3">
        <a href="./index.php" class="btn btn-danger mt-3">ยกเลิก</a>
    </form>
</div>
