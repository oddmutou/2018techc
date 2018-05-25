<!DOCTYPE html>
<head>
    <title>課題4掲示板ページ</title>
    <link rel="stylesheet" type="text/css" href="./bbs.css">
</head>
<body>
<a href="#bbs-form">投稿フォームへ</a>
<hr>
<h1 id="title">掲示板</h1>

<?php
$file = '/tmp/kadai_4_bbs.txt';
$string = file_get_contents($file);
$list = preg_split("/\n/", $string);
foreach ($list as $line){
    $parsed = preg_split("/,/", $line);
    if(!$parsed[0] || !$parsed[1]){
        continue;
    }
    print(
        '<div class="res">'
        . '<div class="res-info">投稿者: <span class="res-name">' . $parsed[0] ."</span>" . '<span calss="res-date">: ' . $parsed[2] . '</span></div>'
        . '<div class="res-body">' . $parsed[1] . "</div>"
        . '</div>'
    );
}
?>

<hr>
<a href="#title">一番上へ</a>
<div class="form-box">
    <form action="./write.php" method="post" id="bbs-form">
        <div>
            <input type="submit" value="書き込む">
            名前: (省略可)<input type="text" name="name">
        </div>
        <textarea name="body" cols="100" rows="5"></textarea>
    </form>
</div>
</body>
