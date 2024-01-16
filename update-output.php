<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>情報更新</h1>
<?php
    if(empty($_POST['genre_id'])){
        $genre_id = null;
    }
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update game set title=?, price=?, genre_id=?, sale_data=? where game_id=?');
    if($sql->execute([$_POST['title'],$_POST['price'],null,$_POST['date'],$_POST['game_id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
?>
<hr>
<table>
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
        if(empty($genre['genre_name'])){
            echo '<td></td>';
        }else{
            echo '<td>',$genre['genre_name'],'</td>';
        }
        echo '<td>',$row['sale_data'],'</td>';
        echo '</tr>';
    }
?>
</table>
<form action="list.php">
        <input type="submit" value="ゲーム一覧へ">
</form>
<?php require 'footer.php'; ?>