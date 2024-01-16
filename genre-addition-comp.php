<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ジャンル追加</h1>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into genre(genre_name)  values(?)');
    foreach($pdo->query('select * from genre') as $row){
        if($row['genre_name'] == $_POST['name']){
            $name = $row['genre_name'];
        }
    }
    if(empty($name)){
        if($sql->execute([$_POST['name']])){
            $error = '追加に成功しました。';
        }else{
            $error = '追加に失敗しました。';
        }
    }else{
        $error = '追加に失敗しました。';
    }
    echo $error;
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
<form action="list.php">
        <input type="submit" value="ゲーム一覧へ">
</form>
<?php require 'footer.php'; ?>