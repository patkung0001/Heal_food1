<?php
// 1. ส่วนการดึงค่าจากระบบ Vercel (ชื่อ Key ต้องตรงกับที่ตั้งในหน้า Settings ของ Vercel)
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

try {
    // 2. คำสั่งเชื่อมต่อฐานข้อมูลแบบ PDO พร้อมเปิดระบบความปลอดภัย SSL
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        array(
            PDO::MYSQL_ATTR_SSL_CA => true, // บังคับใช้ SSL สำหรับ TiDB Cloud
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
    // echo "เชื่อมต่อฐานข้อมูลสำเร็จ!"; 
} catch(PDOException $e) {
    die("เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage());
}
?>
