<!DOCTYPE html>
<head>
</head>
<body>
<?php
if($_POST['body']){
    $file = '/tmp/kadai_4_bbs.txt';
    $string = file_get_contents($file);
    $name = $_POST['name'] ? str_replace(PHP_EOL, '', nl2br(htmlspecialchars($_POST['name'], ENT_QUOTES))) : "名無しさん";
    $body = str_replace(PHP_EOL, '', nl2br(htmlspecialchars($_POST['body'], ENT_QUOTES)));
    $string .= "\n" . join(",", array($name, $body, date("Y/m/d H:m:s", time())));
    file_put_contents($file, $string);

    header("HTTP/1.1 303 Moved Permanently");
    header("Location: ./read.php");
    exit();
} else {
    print('<div class="error">本文が記入されていません。<a href="./read.php">もどる</a></div>');
}
?>
</body>
