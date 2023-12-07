<?php
$perfumes = ["香水A", "香水B", "香水C",];
// 10% の確率でエラーを発生させます（以前は20%）
if (rand(0, 200) === 0) {
    header('Content-Type: application/json');
    echo json_encode(['error' => '今日はごめん、香りを探せなかった。もう一度試す？']);
    exit;
}

$randomIndex = array_rand($perfumes);
$recommendedPerfume = $perfumes[$randomIndex];

header('Content-Type: application/json');
echo json_encode(['perfume' => $recommendedPerfume]);
?>
