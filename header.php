<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" center="width=device-width, initial-scale=1.0">
<title>ゲーム管理</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
<?php
    if( isset($css) && !empty($css)){
        echo '<link rel="stylesheet" href="css/',$css,'">';
    }
?>