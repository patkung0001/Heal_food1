<?php
// 1. ส่วนการดึงค่าจากระบบ Vercel (เราจะไปตั้งค่าในเว็บ Vercel ภายหลัง)
$host = getenv('gateway01.ap-southeast-1.prod.aws.tidbcloud.com'); 
$port = getenv('4000');
$user = getenv('2A84xthCJfabDxf.root');
$pass = getenv('4ssSGHnFLJ9FvKWB');
$dbname = getenv('test');

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
    
    // หมายเหตุ: ถ้าเชื่อมต่อสำเร็จ หน้าเว็บจะว่างเปล่า (ปกติ) 
    // แต่ถ้าอยากทดสอบให้เอา // หน้าบรรทัดข้างล่างออก
    // echo "เชื่อมต่อฐานข้อมูลสำเร็จ!"; 

} catch(PDOException $e) {
    // ถ้าเชื่อมต่อไม่ได้ ให้แสดงข้อความเตือน
    die("เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage());
}
?>