<?php
// ดึงค่าจากตัวแปรที่เราตั้งไว้ในหน้า Settings ของ Vercel
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

try {
    // เชื่อมต่อแบบ PDO พร้อมเปิด SSL สำหรับ TiDB Cloud
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        array(
            PDO::MYSQL_ATTR_SSL_CA => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
    // ถ้าเชื่อมต่อสำเร็จ จะไม่มีข้อความอะไรขึ้น (เป็นหน้าว่างถือว่าปกติ)
} catch(PDOException $e) {
    // ถ้าเชื่อมต่อไม่ได้ จะแสดงข้อความ Error
    die("Connection failed: " . $e->getMessage());
}
?>
