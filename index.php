<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>あなたと百物語</title>
</head>
<body>
    <div>
        <h2>告</h2>
        <p>百物語に参加したことにより生じた不利益・悪影響に関して、当サイトは一切の責任を持ちません。</p>
        <p>予めご了承ください。</p>
    </div>

    <div>
        <p>百物語を始めますか？</p>
        
        <button onclick="location.href='./home.php'">はい</button>
        <button onclick="location.href='./goodbye.php'">いいえ</button>
    </div>
</body>
</html>

<!-- memo -->
<!-- user定義：0=withdraw; 1=user; 2=admin; 3=banned(blacklisted) -->

<!-- 反省 -->
<!-- よかった点： -->
<!-- ・納得のいくビジュアルにできた -->

<!-- 悔しかった点： -->
<!-- ・一番やりたかったおばけポイントの設置＆おばけ効果が組み込めなかったこと（時間がなくなってしまった） -->
<!-- （unityでおばけの顔を作る、悲鳴、化け字、恐怖を煽る言葉） -->

<!-- 改善点 -->
<!-- ・（login時）user名、emailが登録ずみでないかのチェック -->
<!-- ・コメントを投稿者が削除できるようにする -->
<!-- ・各語りのコメント数を表示 -->
<!-- ・パスワードの字数設定 -->

<!-- 細かい（もっと改善できる）点 -->
<!-- ・index.php、goodbye.phpのビジュアル改善（看板を立てたかった） -->
<!-- ・蝋燭を揺らす（同期からのコメント）、蝋燭を段々減らしていく -->
<!-- ・home.php 新しい記事に”new”をつける-->
<!-- ・admin_update.phpのbindvalueを含めるとなぜerrorになってしまったのか？ -->
<!-- ・user_delete.phpで削除する前の削除アラート -->
<!-- ・投稿にタグ付けができるとなおよし -->