<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>情報更新</h1>
<hr>
<form action="update-output.php" method="post">
    <?php
        $id = $_POST['genre_id'];
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from game where game_id = ?');
        $sql->execute([$_POST['game_id']]);
        $rows = $sql->fetch();
        echo '<p>タイトル名<input type="text" name="title" value="',$rows['title'],'"></p>';
        echo 'ジャンル';
        echo '<select name="genre_id" require>';
        if(empty($id)){
            echo '<option value="">選択されていません</option>';
        }
        foreach ($pdo->query('select * from genre') as $row) {
            if($row['genre_id'] == $id){
                echo '<option value="',$row['genre_id'],'" selected>',$row['genre_name'],'</option>';
            }else{
                echo '<option value="',$row['genre_id'],'">',$row['genre_name'],'</option>';
            }
        }
        echo '</select>';
        echo '<p>価格<input type="number" name="price" value="',$rows['price'],'"></p>';
        echo '<p>発売日/リリース開始日<input type="date" name="date" value="',$rows['sale_data'],'"></p>';
        echo '<input type="hidden" name="game_id" value="',$_POST['game_id'],'">';
    ?>
    <input type="submit" value="更新" name="addition">
</form>
<form action="list.php">
        <input type="submit" value="戻る">
</form>
<?php require 'footer.php'; ?>