<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy App - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Prompt", sans-serif;
            background: #f0fff4;
            margin: 0; padding: 0;
        }
        .container { max-width: 900px; margin: auto; padding: 60px 20px; text-align: center; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 40px; }
        .menu-card { 
            background: white; border-radius: 20px; padding: 30px; 
            box-shadow: 0 10px 20px rgba(0,0,0,0.05); 
            text-decoration: none; color: #333; transition: 0.3s; cursor: pointer;
        }
        .menu-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .icon { font-size: 50px; margin-bottom: 15px; display: block; }
        h2 { color: #2d5a27; }
    </style>
</head>
<body>

<div class="container">
    <h2>สวัสดีค่ะ ยินดีต้อนรับสู่ Healthy App 🍏</h2>
    <p>วันนี้อยากดูแลสุขภาพด้านไหนดีคะ? เลือกเมนูได้เลย</p>

    <div class="menu-grid">
        <div class="menu-card" onclick="window.botpress.open()">
            <span class="icon">🤖</span>
            <h3>Healthy AI Chat</h3>
            <small>คลิกเพื่อคุยกับ AI</small>
        </div>

        <div class="menu-card">
            <span class="icon">🥗</span>
            <h3>เมนูแนะนำ</h3>
            <small>รายการอาหารสุขภาพ</small>
        </div>

        <div class="menu-card">
            <span class="icon">⚙️</span>
            <h3>จัดการโปรไฟล์</h3>
            <small>ข้อมูลส่วนตัว</small>
        </div>
    </div>
</div>

<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>

<script src="https://files.bpcontent.cloud/2026/01/20/18/20260120183108-IJXWM2NQ.json"></script>

<script>
    // เมื่อบอทพร้อม ให้ทำงานตามนี้
    window.botpress.on('ready', function() {
        console.log("Healthy Buddy พร้อมทำงาน!");
    });
</script>

</body>
</html>
