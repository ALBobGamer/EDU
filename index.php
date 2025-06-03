<?php
$pdo = new PDO("mysql:host=localhost;dbname=my_site", "root", "");

// احصل على IP الزائر
$ip = $_SERVER['REMOTE_ADDR'];

// تأكد أنه لم يسجل في آخر 24 ساعة (تجنب التكرار)
$stmt = $pdo->prepare("SELECT COUNT(*) FROM visitors WHERE ip_address = ? AND visit_time >= NOW() - INTERVAL 1 DAY");
$stmt->execute([$ip]);

if ($stmt->fetchColumn() == 0) {
    $stmt = $pdo->prepare("INSERT INTO visitors (ip_address) VALUES (?)");
    $stmt->execute([$ip]);
}
?>

<h2>مرحبًا بك في الموقع!</h2>
