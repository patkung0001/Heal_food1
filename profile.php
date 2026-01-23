<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ถ้ายังไม่ได้ล็อกอิน -> กลับไป login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('server.php'); // เรียกไฟล์เชื่อมต่อฐานข้อมูล

$username = $_SESSION['username'];

// ดึงข้อมูลจากตาราง users
$sql = "SELECT * FROM user WHERE username = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("❌ Query ผิดพลาด: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

// ถ้าไม่พบข้อมูลใน DB
if (!$user) {
    die("❌ ไม่พบข้อมูลผู้ใช้ในฐานข้อมูล");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>โปรไฟล์ของฉัน</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; }
    .card { border: 1px solid #ccc; padding: 20px; border-radius: 10px; background: #f9f9f9; }
    .avatar { width: 100px; height: 100px; border-radius: 50%; background: #ddd; display: block; margin: 0 auto 15px; }
    .label { font-weight: bold; color: #333; }
    .menu { margin-top: 20px; }
    .menu a { margin-right: 10px; }
  </style>
</head>
<body>
  <h2>👤 โปรไฟล์ของฉัน</h2>
  <div class="card">  
    <div class="avatar"></div>
    <p><span class="label">ชื่อผู้ใช้:</span> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><span class="label">ชื่อ-นามสกุล:</span> <?php echo htmlspecialchars($user['fullname']); ?></p>
    <p><span class="label">อีเมล:</span> <?php echo htmlspecialchars($user['email']); ?></p>
  
  </div>

  <div class="menu">
    <a href="index.php">🏠 กลับไปหน้าหลัก</a>
    <a href="login.php">🚪 ออกจากระบบ</a>
  </div>
</body>
</html>
