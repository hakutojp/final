<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<h1>ジャンル追加</h1>
<hr>
<form action="genre-addition-comp.php" method="post">
    <p>ジャンル名<input type="text" name="name"></p>
    <input type="submit" value="追加" name="addition">
</form>
<form action="genre-list.php">
        <input type="submit" value="戻る">
</form>
<?php require 'footer.php'; ?>