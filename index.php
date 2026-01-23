<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
    body {
        font-family: "Prompt", sans-serif;
        background: #9fffcf;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        margin: auto;
        padding: 40px 20px;
        text-align: center;
    }

    h2 {
        font-size: 28px;
        color: #222;
        margin-bottom: 5px;
    }

    .subtitle {
        font-size: 16px;
        color: #444;
        margin-bottom: 30px;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .menu-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        transition: 0.2s;
        text-decoration: none;
        color: #333;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    }

    .icon {
        font-size: 40px;
        margin-bottom: 10px;
        display: block;
    }
</style>

</head>
<body>

<div class="container">
    
    <h2>สวัสดีคุณ</h2>
    <div class="subtitle">เลือกเมนูเพื่อเริ่มใช้งาน</div>

    <div class="menu-grid">

        <a href="chat_ui.php" class="menu-card">
            <span class="icon">🍏</span>
            <h3>Healthy Food Chatbot</h3>
        </a>

        <a href="menu.php" class="menu-card">
            <span class="icon">📋</span>
            <h3>แนะนำอาหาร</h3>
        </a>

        <a href="profile.php" class="menu-card">
            <span class="icon">👤</span>
            <h3>โปรไฟล์</h3>
        </a>

       

        <a href="login.php" class="menu-card">
            <span class="icon">🚪</span>
            <h3>ออกจากระบบ</h3>
        </a>

    </div>

</div>

</body>
</html>
