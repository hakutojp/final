<?php require 'db-connect.php'; ?>
<?php $css = 'list.css'; ?>
<?php require 'header.php'; ?>
<h1 class="is-size-3 has-text-weight-bold ml-6">ゲーム管理</h1>
<hr>
<form action="registration-input.php" method="post">
    <div id="button">
    <input type="submit" class="button is-link" name="regist" value="ゲーム追加">
</form>
<form action="genre-list.php">
    <input type="submit" class="button is-success ml-6" value="ジャンル一覧">
</form>
</div>
<table class="table has-text-centered mb-6 mt-6 is-bordered">
    <tr>
        <th>タイトル名</th>
        <th>価格</th>
        <th>ジャンル</th>
        <th>発売日/リリース開始日</th>
        <th>操作</th>
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
        if(!empty($genre['genre_name'])){
            echo '<td>',$genre['genre_name'],'</td>';
        }else{
            echo  '<td></td>';
        }
        echo '<td>',$row['sale_data'],'</td>';

        echo '<td>';
        echo '<form action="update-input.php" method="post">';
        echo '<input type="hidden" name="game_id" value="'.$row['game_id'].'">';
        echo '<input type="hidden" name="genre_id" value="'.$row['genre_id'].'">';
        echo '<input type="submit" name="operation" class="button is-warning has-text-weight-bold" value="更新">';
        echo '</form>';
        
        echo '<form action="delete-input.php" method="post">';
        echo '<input type="hidden" name="game_id" value="'.$row['game_id'].'">';
        echo '<input type="submit" name="operation" class=" mt-3 button is-danger has-text-weight-bold" value="削除">';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }
?>
</table>
<?php require 'footer.php'; ?>