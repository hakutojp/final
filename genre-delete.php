<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ジャンル削除</h1>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $update = $pdo->prepare('update game set genre_id = NULL where genre_id=?');
    $update->execute([$_POST['genre_id']]);
    $sql = $pdo->prepare('delete from genre where genre_id=?');
    if($sql->execute([$_POST['genre_id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
<hr>
<table>
    <tr>
        <th>ジャンルID</th>
        <th>ジャンル名</th>
    </tr>
<?php
    $pdo = new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from genre') as $row) {
        echo '<tr>';
        echo '<td>',$row['genre_id'],'</td>';
        echo '<td>',$row['genre_name'],'</td>';
        echo '</tr>';
    }
?>
</table>

<form action="genre-list.php">
        <input type="submit" value="ジャンル一覧へ">
</form>
<?php require 'footer.php'; ?>