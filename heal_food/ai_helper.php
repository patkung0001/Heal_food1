<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Healthy Chat Bot</title>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&family=Noto+Sans+Thai:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body {
  font-family: "Noto Sans Thai", "Kanit", sans-serif;
  background: linear-gradient(135deg, #eef3ff, #f7fbff);
  padding: 20px;
}

.menu {
  margin-bottom: 20px;
}

.menu a {
  margin-right: 15px;
  text-decoration: none;
  color: #4a6cff;
  font-weight: 500;
}

.chat-box {
  background: #ffffff;
  width: 600px;
  margin: 20px auto;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.message {
  padding: 14px 18px;
  margin: 12px 0;
  border-radius: 15px;
  font-size: 16px;
  max-width: 80%;
}

.bot {
  background: #e9ffe9;
}
</style>
</head>

<body>

<div class="menu">
  <a href="index.php">🏠 กลับไปหน้าหลัก</a>
  <a href="login.php">🚪 ออกจากระบบ</a>
</div>

<div class="chat-box">
  <div class="message bot">
    🍎 สวัสดี! ฉันคือบอทแนะนำอาหารเพื่อสุขภาพ  
    <br><br>
    👉 คลิกปุ่มแชตมุมขวาล่างเพื่อเริ่มคุยได้เลย
  </div>
</div>

<!-- ================= Botpress Webchat (ของจริง) ================= -->
<<!-- Botpress Webchat -->
<script src="https://cdn.botpress.cloud/webchat/v3.5/inject.js"></script>

<script>
  window.botpressWebChat.init({
    configUrl: "https://files.bpcontent.cloud/2026/01/20/18/20260120183108-IJXWM2NQ.json"
  });
</script>
</body>

</html>
