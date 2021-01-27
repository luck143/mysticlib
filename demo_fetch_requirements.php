<?php
require_once(__DIR__.'/mysticlib.php');
//print_array($GLOBALS);

$url=$GLOBALS['apiurl'].'fetch/requirements';

echo "<br> Calling API Endpoint : " .@$url;
$response=curl_get($url,$GLOBALS['rapidapi_header']);
$result=json_decode(@$response,true);
if(is_array($result))
{
    print_array($result);
}
else
{
    echo "<br> Error : " .$result;
    exit;
}