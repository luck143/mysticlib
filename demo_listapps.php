<?php
require_once(__DIR__.'/mysticlib.php');
//print_array($GLOBALS);


$url=$GLOBALS['apiurl'].'listapps/astrology/';

echo "<br> Calling API Endpoint : " .@$url;
$response=curl_get($url,$GLOBALS['rapidapi_header']);
$result=json_decode(@$response,true);
if(is_array($result))
{
    //print_array($result);
}
else
{
    echo "<br> Error : " .$result;
    exit;
}

echo "<hr><h2>Applciations</h2>";
foreach(@$result['data']['data'] as $entry)
{
    echo "<br>**********************************";
    echo "<br>Applications ID : ".@$entry['id'];
    echo "<br>Applications Name : ".ucwords(@$entry['name']);
    echo "<br>Application Image : ".@$entry['image'];
    echo "<br>Applications category : ".@$entry['category'];
}

echo "<hr><h2>Raw result</h2>";
print_array($result);
