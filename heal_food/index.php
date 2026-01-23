<?php
session_start();
// ตรวจสอบว่า Login หรือยัง (ถ้าไม่มีชื่อใน session ให้กลับไปหน้า login)
if (!isset($_SESSION['username'])) {
    // header("Location: login.php"); // เปิดใช้งานเมื่อทำระบบ login เสร็จ
    $display_name = "ผู้ใช้งาน";
} else {
    $display_name = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Healthy App</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* ใช้ CSS เดิมของคุณ แต่ปรับสี Background ให้ดู Soft ขึ้น */
        body {
            font-family: "Prompt", sans-serif;
            background: #f0fff4; /* สีเขียวอ่อนแบบมินิมอล */
            margin: 0;
            padding: 0;
        }
        /* ... CSS เดิมของคุณ ... */
        .container { max-width: 900px; margin: auto; padding: 60px 20px; text-align: center; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 40px; }
        .menu-card { background: white; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); text-decoration: none; color: #333; transition: 0.3s; }
        .menu-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .icon { font-size: 50px; margin-bottom: 15px; display: block; }
    </style>
</head>
<body>

<div class="container">
    <h2>สวัสดีคุณ <?php echo $display_name; ?> 🍏</h2>
    <div class="subtitle">วันนี้อยากดูแลสุขภาพด้านไหนดีคะ? เลือกเมนูได้เลย</div>

    <div class="menu-grid">
        <a href="ai_helper.php" class="menu-card">
            <span class="icon">🤖</span>
            <h3>Healthy AI Chat</h3>
            <small>ปรึกษาเรื่องอาหาร</small>
        </a>

        <a href="menu.php" class="menu-card">
            <span class="icon">🥗</span>
            <h3>เมนูแนะนำ</h3>
            <small>รายการอาหารสุขภาพ</small>
        </a>

        <a href="profile.php" class="menu-card">
            <span class="icon">⚙️</span>
            <h3>จัดการโปรไฟล์</h3>
            <small>ข้อมูลส่วนตัว</small>
        </a>

        <a href="logout.php" class="menu-card" style="border-top: 4px solid #ff6b6b;">
            <span class="icon">🚪</span>
            <h3>ออกจากระบบ</h3>
        </a>
    </div>
</div>

</body>
</html>
