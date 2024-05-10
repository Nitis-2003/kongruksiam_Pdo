<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">PHP PDO CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-auto" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="./index.php">ข้อมูลพนักงาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./addform.php">เพิ่มข้อมูล</a>
        </li>
        <?php if(!isset($_SESSION['uid'])) {?>
          <li class="nav-item">
            <a class="nav-link text-white" href="./loginform.php">เข้าสู่ระบบ</a>
          </li>
        <?php }else{?>
          <li class="nav-item dropdown">
          <a class="nav-link  text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            สวัสดี , <?php echo $_SESSION['username'] ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./logout.php">ออกจากระบบ</a></li>
          </ul>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>