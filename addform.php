<?php
$title = "insert";
require_once('./layout/header.php');
require_once('./layout/nav.php');
?>
<body>
    <?php require_once('./layout/nav.php'); ?>
    <div class="container mt-3">
        <h1 class="text-center">เพิ่มข้อมูล</h1>
        <form method="POST" action="./showdata.php">
            <div class="form-group mt-3">
                <label for="fname">ชื่อ</label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="lname">นามสกุล</label>
                <input type="text" name="lname" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="salary">เงินเดือน</label>
                <input type="text" name="salary" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="dept">แผนก</label>
                <select name="dept" class="form-control">
                    <option value="">ไอที</option>
                    <option value="">โปรแกรมเมอร์</option>
                    <option value="">บัญชี</option>
                </select>
            </div>
            <input type="submit" value="บันทึก" class="btn btn-success mt-3">
            <input type="reset" value="รีเซ็ต" class="btn btn-danger mt-3">
        </form>
    </div>
</body>
</html>