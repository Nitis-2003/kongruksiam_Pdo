<?php
$title = "Home";
require_once('./layout/header.php');
require_once('./db/connect.php');
$result = $controller->getEmployees();
?>

<body>
    <?php require_once('./layout/nav.php'); ?>
    <div class="container mt-3">
        <h1 class="text-center">ข้อมูลพนักงาน</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ชื่อพนักงาน</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เงินเดือน</th>
                    <th scope="col">แผนก</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo number_format($row['salary']); ?></td>
                        <td><?php echo $row['department_name']; ?></td>
                        <td><a href="delete.php?id=<?php echo $row['emp_id']; ?>" class="btn btn-danger">ลบข้อมูล</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
</body>

</html>