<!DOCTYPE html>
<html lang="ko"">
<head>
   <title>Viewer Page</title>
   <meta charset="EUC-KR">
</head>
<body style="margin=0; font-size:9pt;">
<div style="width:600px;">
<?php

error_reporting(E_ERROR | E_PARSE);

if( get_magic_quotes_gpc() ) {

    if (!empty($_POST['uri'])) $_POST['uri'] = stripslashes($_POST['uri']);

    if (!empty($_POST['referer'])) $_POST['referer'] = stripslashes($_POST['referer']);

    if (!empty($_POST['encoding'])) $_POST['encoding'] = stripslashes($_POST['encoding']);

    if (!empty($_POST['method'])) $_POST['method'] = stripslashes($_POST['method']);

    foreach($_POST['name'] as $k => $v){

        if (!empty($_POST['name'][$k])) $_POST['name'][$k] = stripslashes($v);

        if (!empty($_POST['value'][$k])) $_POST['value'][$k] = stripslashes($_POST['value'][$k]);
    }
}

if (empty($_POST['uri'])) {

    echo('URI이 없습니다 <br />');
}
else if (!preg_match("`^https?://`i", $_POST['uri'])) {

    echo('URI에는 반드시 맨처음에 http:// 나 https:// 가 붙어야 합니다. <br />');
}
else if (!empty($_POST['referer']) && !preg_match("`^https?://`i", $_POST['referer'])) {

    echo('REFERER에는 반드시 맨처음에 http:// 나 https:// 가 붙어야 합니다. <br />');
}

if ($_POST['encoding'] != 'UTF-8') {

    $_POST['encoding'] = 'EUC-KR';
}

if ($_POST['method'] != 'POST') {

    $_POST['method'] = 'GET';
}



include_once "./Snoopy-1.2.4/Snoopy.class.php";

$sp = new Snoopy;
//$sp->curl_path = "/usr/local/bin/curl";//리눅스, https 를 사용하고자 할때는 서버의 curl 경로를 절대경로 맞추어 주세요.
$sp->curl_path = dirname(__FILE__) . '/curl/curl.exe';//윈도우, https 를 사용하고자 할때는 서버의 curl 경로를 절대경로 맞추어 주세요.
$sp->agent = $_SERVER['HTTP_USER_AGENT'];

if (!empty($_POST['referer'])) $sp->referer = $_POST['referer'];

if ($_POST['method'] == 'GET') {

    $sp->fetch($_POST['uri']);
}
else {//POST

    $postdata = Array();

    foreach($_POST['name'] as $k => $v){

        $postdata[$v] = $_POST['value'][$k];
    }

    $sp->submit($_POST['uri'], $postdata);
}

if (!empty($sp->error)) {

    echo "
    <br />
    <h5>에러 정보</h5>
    ";

    echo $sp->error;
}

echo "
<br />
<h5>헤더 정보</h5>
";
foreach($sp->headers as $header){

    echo $header . "<br />";
}

echo "
<br />
<h5>소스</h5>
";

if ($_POST['encoding'] == 'UTF-8') $sp->results = iconv('UTF-8', 'CP949', $sp->results);

echo nl2br(str_replace(array(" ", "\t"), array("&nbsp;", "&nbsp;&nbsp;&nbsp;&nbsp;"), htmlspecialchars($sp->results)));

?>
</div>
</body>
</html>
