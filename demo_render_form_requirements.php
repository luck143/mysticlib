<?php
require_once(__DIR__.'/mysticlib.php');
//print_array($GLOBALS);

$appid='';
if(strlen(@$_REQUEST['app'])>0)
{
    $appid=@$_REQUEST['app'];
}
else
{
    $appid='all-in-one';
}


$url=$GLOBALS['apiurl'].'render_form_inputs/';

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


echo "<hr><h2>Raw Result </h2>";
print_array($result);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
