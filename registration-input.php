<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ゲーム登録</h1>
<hr>
<form action="registration-output.php" method="post">
    <p>タイトル名<input type="text" name="title"></p>
    <p>価格<input type="number" name="price"></p>
    <p class="has-text-danger">※基本プレイ無料の場合は0を入力</p>
    ジャンル
    <select name="genre_id" require>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from genre') as $row) {
           echo '<option value="',$row['genre_id'],'">',$row['genre_name'],'</option>';
        }
    ?>
    </select>
    <p>発売日/リリース開始日<input type="date" name="date"></p>
    <input type="submit" value="追加" name="addition">
</form>
<form action="list.php">
        <input type="submit" value="戻る">
</form>
<?php require 'footer.php'; ?>