document.getElementById('recommend-perfume').addEventListener('click', function() {
    // 「今日の香水を見る」をフェードアウト
    document.querySelector('.today-perfume').classList.add('fade-out');

    // ボタンのアニメーション
    this.style.animation = 'shrinkAndMoveUp 0.5s forwards';

    // 「あなたの香りを...」のメッセージを表示
    document.getElementById('message-output').innerText = "あなたの香りを...";

    // 2秒後にメッセージを「お調べしております...」に変更し、「今日はやっぱりやめる」ボタンを表示
    setTimeout(() => {
        document.getElementById('message-output').innerText = "お調べしております...";
        document.getElementById('cancel-button').style.display = 'block';
    }, 1500); // 2秒の遅延

    // PHPスクリプトへのリクエスト
    fetch('perfumes.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                // エラーメッセージを表示
                if (confirm(data.error)) {
                    window.location.href = 'index.php';
                }
            } else {
                // 通常の処理：3秒後に結果ページへリダイレクト
                setTimeout(() => {
                    window.location.href = 'result.php?perfume=' + encodeURIComponent(data.perfume);
                }, 3000);
            }
        })
        .catch(error => {
            document.getElementById('perfume-output').innerText = "エラーが発生しました: " + error;
        });
});

// 「今日はやっぱりやめる」ボタンの挙動
document.getElementById('cancel-button').addEventListener('click', function() {
    window.location.href = 'index.php';
});
