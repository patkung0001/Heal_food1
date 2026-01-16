<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Healthy Chat Bot (Gemini)</title>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&family=Noto+Sans+Thai:wght@300;400;500&display=swap" rel="stylesheet">

<style>
/* ฟอนต์ + สีพื้นหลังนุ่ม */
body {
  font-family: "Noto Sans Thai", "Kanit", sans-serif;
  background: linear-gradient(135deg, #eef3ff, #f7fbff);
  padding: 20px;
}

/* เมนู */
.menu {
  text-align: left;
  margin-bottom: 20px;
}

.menu a {
  margin-right: 15px;
  text-decoration: none;
  color: #4a6cff;
  font-weight: 500;
  transition: 0.2s;
}

.menu a:hover {
  color: #1c3dff;
}

/* กล่องแชท */
.chat-box {
  background: #ffffff;
  width: 600px;
  margin: 20px auto;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
  overflow-y: auto;
  max-height: 70vh;
  border: 1px solid rgba(0,0,0,0.05);
}

/* bubble พื้นฐาน */
.message {
  padding: 14px 18px;
  margin: 12px 0;
  border-radius: 15px;
  font-size: 16px;
  max-width: 80%;
  line-height: 1.5;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* ข้อความผู้ใช้ */
.user {
  background: #d9e4ff;
  text-align: right;
  margin-left: auto;
  border-bottom-right-radius: 0;
  animation: fadeIn 0.3s ease;
}

/* ข้อความบอท */
.bot {
  background: #e9ffe9;
  text-align: left;
  margin-right: auto;
  border-bottom-left-radius: 0;
  animation: fadeIn 0.3s ease;
}

/* Input Area */
.input-area {
  text-align: center;
  margin-top: 20px;
}

/* ช่อง input */
#userInput {
  width: 55%;
  padding: 12px 18px;
  border-radius: 30px;
  border: 1px solid #ccc;
  outline: none;
  font-size: 15px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.08);
  transition: 0.2s;
}

#userInput:focus {
  border-color: #4a6cff;
  box-shadow: 0 0 8px rgba(74,108,255,0.3);
}

/* ปุ่มส่งข้อความ */
button {
  padding: 12px 25px;
  border-radius: 25px;
  cursor: pointer;
  background: linear-gradient(135deg, #4c8bff, #1e5fff);
  color: #fff;
  border: none;
  font-size: 15px;
  font-weight: 500;
  margin-left: 10px;
  box-shadow: 0 4px 12px rgba(30,95,255,0.3);
  transition: 0.2s ease;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(30,95,255,0.4);
}

button:active {
  transform: scale(0.97);
}

/* เอฟเฟกต์ข้อความ */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(5px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<div class="menu">
  <a href="index.php">🏠 กลับไปหน้าหลัก</a>
  <a href="login.php">🚪 ออกจากระบบ</a>
</div>

<div class="chat-box" id="chatBox">
  <div class="message bot">🍎 สวัสดี! ฉันคือบอทแนะนำอาหารเพื่อสุขภาพจาก Gemini</div>
</div>

<div class="input-area">
  <input type="text" id="userInput" placeholder="พิมพ์คำถามของคุณ..." />
  <button onclick="sendMessage()">ส่ง</button>
</div>

<script>
function sendMessage() {
  const input = document.getElementById('userInput');
  const chatBox = document.getElementById('chatBox');
  const userText = input.value;

  if (!userText.trim()) return;

  chatBox.innerHTML += `<div class="message user">${userText}</div>`;
  input.value = '';

  fetch('gemini.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'message=' + encodeURIComponent(userText)
  })
  .then(res => res.text())
  .then(reply => {
    chatBox.innerHTML += `<div class="message bot">${reply}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
  });
}

// ✅ เมื่อกด Enter ก็ส่งข้อความได้เลย
document.getElementById("userInput").addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    sendMessage();
  }
});
</script>

</body>
</html>
