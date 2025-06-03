<?php
$pdo = new PDO("mysql:host=localhost;dbname=my_site", "root", "");

// اجمع عدد الزوار الكلي
$stmt = $pdo->query("SELECT COUNT(*) FROM visitors");
$total = $stmt->fetchColumn();
?>

<h2>لوحة التحكم - عدد الزوار</h2>
<p>عدد الزوار الكلي: <?= $total ?></p>
