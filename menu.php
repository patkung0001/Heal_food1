<?php
// ================== DATA ==================

$foods = [

    "kaprao-chicken-lean" => [
        "name" => "กะเพราอกไก่คลีน",
        "types" => ["high-protein","low-fat","weight-loss"],
        "image" => "https://assets.unileversolutions.com/recipes-v2/117572.jpg",
        "desc" => "ผัดกะเพราอกไก่น้ำมันน้อย โปรตีนสูง ไขมันต่ำ เหมาะสำหรับควบคุมน้ำหนัก",
        "ingredients" => [
            "อกไก่สับ 180–200 กรัม",
            "กระเทียม",
            "พริกขี้หนู",
            "ใบกะเพรา",
            "ซอสโซเดียมต่ำ"
        ],
        "steps" => [
            "ผัดกระเทียมและพริกด้วยน้ำมันเล็กน้อย",
            "ใส่อกไก่ลงผัดจนสุก",
            "ปรุงรสและใส่ใบกะเพราก่อนปิดไฟ"
        ],
        "nutrition" => "≈220 kcal | โปรตีน 35g | ไขมัน 4–5g | คาร์บ 4–6g"
    ],

    "larb-chicken" => [
        "name" => "ลาบไก่คลีน",
        "types" => ["low-fat","weight-loss","high-protein"],
        "image" => "https://assets.unileversolutions.com/recipes-v2/117714.jpg",
        "desc" => "ลาบไก่ลวก ไขมันต่ำ เหมาะสำหรับควบคุมน้ำหนัก",
        "ingredients" => [
            "อกไก่บด",
            "น้ำมะนาว",
            "พริกป่น",
            "ข้าวคั่ว",
            "หอมแดง"
        ],
        "steps" => [
            "ลวกไก่ในน้ำเดือดจนสุก",
            "คลุกกับเครื่องปรุง",
            "ใส่ผักและเสิร์ฟ"
        ],
        "nutrition" => "≈170 kcal | โปรตีน 28g | ไขมัน 3–4g | คาร์บ 3g"
    ],

    "steamed-fish-lime" => [
        "name" => "ปลานึ่งมะนาว",
        "types" => ["low-fat","heart-healthy","weight-loss"],
        "image" => "https://www.noobeebee.com/wp-content/uploads/2017/09/maxresdefault-3.jpg",
        "desc" => "ปลานึ่งไขมันต่ำ ดีต่อหัวใจ",
        "ingredients" => [
            "ปลากะพง",
            "มะนาว",
            "พริก",
            "กระเทียม"
        ],
        "steps" => [
            "นึ่งปลาให้สุก",
            "ผสมน้ำราด",
            "ราดซอสบนปลา"
        ],
        "nutrition" => "≈180 kcal | โปรตีน 30g | ไขมัน 3–4g | คาร์บ 2g"
    ],

    "grilled-salmon" => [
        "name" => "แซลมอนย่างสมุนไพร",
        "types" => ["omega3","heart-healthy","high-protein"],
        "image" => "https://img.kapook.com/u/2021/wanwanat/1974454910_2.jpg",
        "desc" => "แซลมอนย่าง อุดมด้วยโอเมก้า 3",
        "ingredients" => [
            "แซลมอน",
            "พริกไทย",
            "เลมอน"
        ],
        "steps" => [
            "หมักปลา",
            "ย่างปลา",
            "บีบเลมอนเสิร์ฟ"
        ],
        "nutrition" => "≈280 kcal | โปรตีน 25g | ไขมัน 18g | คาร์บ 0–1g"
    ],

    "quinoa-salad" => [
        "name" => "สลัดคีนัวผักรวม",
        "types" => ["weight-loss","heart-healthy"],
        "image" => "https://img.kapook.com/u/2021/sireeporn/Cooking-9/quinoa2.jpg",
        "desc" => "ไฟเบอร์สูง เหมาะกับคนลดน้ำหนัก",
        "ingredients" => [
            "คีนัวสุก",
            "ผักสลัด",
            "แตงกวา",
            "มะเขือเทศ"
        ],
        "steps" => [
            "ผสมทุกอย่าง",
            "ราดน้ำสลัด",
            "แช่เย็นก่อนเสิร์ฟ"
        ],
        "nutrition" => "≈310 kcal | โปรตีน 9–10g | ไขมัน 5–6g | คาร์บ 50–55g"
    ],
];

// ================== FUNCTION ==================
function esc($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

// ================== PARAM ==================
$selected = $_GET['item'] ?? null;
$search   = trim($_GET['search'] ?? '');
$filter   = $_GET['type'] ?? '';

// ================== FILTER ==================
$filteredFoods = [];

foreach($foods as $key=>$food){

    $matchSearch = true;
    $matchType   = true;

    if($search !== ''){
        $text = mb_strtolower($food['name'].' '.$food['desc']);
        if(mb_strpos($text, mb_strtolower($search)) === false){
            $matchSearch = false;
        }
    }

    if($filter !== ''){
        if(!in_array($filter, $food['types'])){
            $matchType = false;
        }
    }

    if($matchSearch && $matchType){
        $filteredFoods[$key] = $food;
    }
}

$labels = [
    "high-protein"=>"โปรตีนสูง",
    "low-fat"=>"ไขมันต่ำ",
    "heart-healthy"=>"ดีต่อหัวใจ",
    "omega3"=>"โอเมก้า 3",
    "weight-loss"=>"ลดน้ำหนัก"
];
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>เมนูสุขภาพ</title>
<style>
:root{
  --bg:#F7FAFC;
  --blue:#6BB7C7;
  --blue-dark:#3A8FA7;
  --blue-soft:#E6F4F7;
  --text:#2F2F2F;
  --sub:#6B7280;
  --border:#E3EEF2;
}

*{box-sizing:border-box}

body{
  font-family: 'Segoe UI', sans-serif;
  background:var(--bg);
  padding:20px;
  color:var(--text);
}

.container{
  max-width:1100px;
  margin:auto;
}

h1,h2,h3,h4{
  color:var(--blue-dark);
  font-weight:600;
}

/* ===== FORM ===== */
form input,form select{
  padding:10px;
  border-radius:12px;
  border:1px solid var(--border);
  background:#fff;
}

form button{
  padding:10px 18px;
  border-radius:12px;
  border:none;
  background:var(--blue);
  color:#fff;
  cursor:pointer;
}

form button:hover{
  background:#5AA9BA;
}

/* ===== GRID ===== */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
  gap:22px;
}

/* ===== CARD ===== */
.card{
  background:#fff;
  border-radius:22px;
  overflow:hidden;
  border:1px solid var(--border);
  box-shadow:0 10px 24px rgba(0,0,0,.04);
  transition:all .35s ease;
}

.card:hover{
  transform:translateY(-6px);
  box-shadow:0 18px 36px rgba(0,0,0,.08);
}

.card img{
  width:100%;
  height:170px;
  object-fit:cover;
}

.body{
  padding:18px;
}

.body p{
  color:var(--sub);
  font-size:14px;
}

/* ===== TAG ===== */
.tag{
  display:inline-block;
  background:var(--blue-soft);
  color:var(--blue-dark);
  padding:5px 12px;
  border-radius:999px;
  font-size:12px;
  margin:4px 4px 0 0;
}

/* ===== BUTTON ===== */
.btn{
  display:inline-block;
  background:var(--blue);
  color:#fff;
  padding:9px 16px;
  border-radius:12px;
  text-decoration:none;
  font-size:14px;
}

.btn:hover{
  background:#5AA9BA;
}

/* ===== DETAIL ===== */
.detail{
  background:#fff;
  padding:26px;
  border-radius:22px;
  border:1px solid var(--border);
  box-shadow:0 12px 28px rgba(0,0,0,.05);
}

.detail img{
  width:100%;
  border-radius:18px;
  margin:14px 0;
}
</style>


</head>
<body>

<div class="container">

<h1>เมนูสุขภาพ</h1>

<?php if($selected && isset($foods[$selected])): 
$f = $foods[$selected]; ?>

<div class="detail">
<h2><?=esc($f['name'])?></h2>
<img src="<?=esc($f['image'])?>" style="width:100%;border-radius:10px">
<p><?=esc($f['desc'])?></p>

<?php foreach($f['types'] as $t): ?>
<span class="tag"><?=$labels[$t]?></span>
<?php endforeach; ?>

<h4>วัตถุดิบ</h4>
<ul><?php foreach($f['ingredients'] as $i): ?><li><?=esc($i)?></li><?php endforeach; ?></ul>

<h4>ขั้นตอน</h4>
<ol><?php foreach($f['steps'] as $s): ?><li><?=esc($s)?></li><?php endforeach; ?></ol>

<p><b>โภชนาการ:</b> <?=esc($f['nutrition'])?></p>
<a href="menu.php" class="btn">← กลับ</a>
</div>

<?php else: ?>

<a href="index.php" class="btn">หน้าหลัก</a>


<form method="get" style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap">
<input type="text" name="search" placeholder="ค้นหาเมนู..." value="<?=esc($search)?>">
<select name="type">
<option value="">ทั้งหมด</option>
<?php foreach($labels as $k=>$v): ?>
<option value="<?=$k?>" <?=$filter==$k?'selected':''?>><?=$v?></option>
<?php endforeach; ?>
</select>
<button>ค้นหา</button>

<a href="menu.php" class="btn">
ล้างตัวกรอง
</a>
</form>

<div class="grid">
<?php foreach($filteredFoods as $k=>$f): ?>
<div class="card">
<img src="<?=esc($f['image'])?>">
<div class="body">
<h3><?=esc($f['name'])?></h3>
<p><?=esc($f['desc'])?></p>
<?php foreach($f['types'] as $t): ?><span class="tag"><?=$labels[$t]?></span><?php endforeach; ?>
<br><br>
<a class="btn" href="?item=<?=$k?>">ดูเมนู</a>
</div>
</div>
<?php endforeach; ?>
</div>

<?php endif; ?>

</div>
</body>
</html>
