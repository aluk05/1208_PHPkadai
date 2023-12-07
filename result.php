<?php
// あなたにおすすめの香水を表示する
$perfumes = [
    "香水A" => ["image" => "img/clean_bottle.png", "link" => "https://fitsonlinestore.com/c/clean/211248171"],
    "香水B" => ["image" => "img/hermes_bottle.png", "link" => "https://www.hermes.com/jp/ja/product/%E3%82%AA%E3%83%BC-%E3%83%89-%E3%83%88%E3%83%AF%E3%83%AC-%E3%80%8A%E3%83%8A%E3%82%A4%E3%83%AB%E3%81%AE%E5%BA%AD%E3%80%8B-V20396/"],
    "香水B" => ["image" => "img/herrera_bottle.png", "link" => "https://www.celes-perfume.com/product/carolina-herrera-212/"],
    // 他の香水も同様に
];

// クエリパラメータから選択された香水を取得
$selectedPerfume = $_GET['perfume'] ?? '';
$perfumeData = $perfumes[$selectedPerfume] ?? null;
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>香水選択</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <?php if ($perfumeData): ?>
        <a href="<?php echo htmlspecialchars($perfumeData['link']); ?>" title="<?php echo htmlspecialchars($selectedPerfume); ?>">
            <img src="<?php echo htmlspecialchars($perfumeData['image']); ?>" alt="<?php echo htmlspecialchars($selectedPerfume); ?>">
        </a>
        <button onclick="window.location.href='index.php'">もう一度試す</button>
    <?php else: ?>
        <script>
            alert('今日はごめん、香りを探せなかった。もう一度試す？');
            window.location.href = 'index.php';
        </script>
    <?php endif; ?>
</body>
</html>


