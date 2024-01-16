<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ジャンル管理</h1>
<hr>
<form action="genre-addition.php">
    <input type="submit" value="ジャンル追加">
</form>
<table>
    <th>ジャンルID</th>
    <th>ジャンル名</th>
    <th></th>
<?php
    $pdo = new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from genre') as $row) {
        echo '<tr>';
        echo '<td>',$row['genre_id'],'</td>';
        echo '<td>',$row['genre_name'],'</td>';
        echo '<td>';
        echo '<form action="genre-delete.php" method="post">';
        echo '<input type="hidden" name="genre_id" value="'.$row['genre_id'].'">';
        echo '<input type="submit" name="operation" value="削除">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
?>
</table>
<form action="list.php">
        <input type="submit" value="ゲーム一覧へ">
</form>
<?php require 'footer.php'; ?>