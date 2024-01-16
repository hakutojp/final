<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ゲーム削除</h1>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from game where game_id=?');
    if($sql->execute([$_POST['game_id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
<hr>
<table class="table has-text-centered mb-6 mt-6 is-bordered">
    <tr>
        <th>タイトル名</th>
        <th>価格</th>
        <th>ジャンル</th>
        <th>発売日/リリース開始日</th>
    </tr>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select genre_name from genre where genre_id=?');
    foreach($pdo->query('select * from game') as $row){
        
        $sql->execute([$row['genre_id']]);
        $genre = $sql->fetch();
        echo '<tr>';
        echo '<td>',$row['title'],'</td>';
        echo '<td>',$row['price'],'</td>';
        echo '<td>',$genre['genre_name'],'</td>';
        echo '<td>',$row['sale_data'],'</td>';
        echo '</tr>';
    }
?>
</table>
<form action="list.php">
        <input type="submit" value="ゲーム一覧へ">
</form>
<?php require 'footer.php'; ?>