<?php
header('Content-Type: text/plain; charset=utf-8');

// ✅ ใส่ API Key ของคุณที่ได้จาก https://aistudio.google.com/app/apikey
$apiKey = "AIzaSyByB9PTNF9yAc6Q4_3dSoY9SN2m4FJX1FY";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "
    นี่คือคำแนะนำอาหารเพื่อสุขภาพสำหรับการลดน้ำหนักค่ะ:<br><br>
...
";

    $message = $_POST['message'] ?? ('');

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

    $data = [
    "contents" => [
        
        
       [
    "role" => "model",
    "parts" => [
        "text" => "สวัสดีค่ะ! พร้อมให้คำแนะนำด้านโภชนาการแล้วค่ะ"
    ],
],

[
    "role" => "user",
    "parts" => [
        "text" => "ช่วยแนะนำอาหารเพื่อสุขภาพ โดยแบ่งเป็นข้อๆ ชัดเจน ใช้ bullet point ไม่เกิน 5 ข้อ แต่ละข้อไม่ยาว"
    ],
],

[
    "role" => "user",
    "parts" => [
        "text" => "ช่วยแนะนำอาหารเกี่ยวกับ: " . $message . 
        "\n\n**ให้ตอบเป็นข้อ ๆ (bullet point) ไม่เกิน 5 ข้อ**\n**เขียนแต่ละข้อให้กระชับและอ่านง่าย**"
    ],
],

    ]
];
    

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    echo $result['candidates'][0]['content']['parts'][0]['text'] ?? "ขอโทษค่ะ ไม่สามารถตอบได้ตอนนี้ 😅";
    
    
}
?>
