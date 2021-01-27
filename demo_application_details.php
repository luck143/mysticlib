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
$url=$GLOBALS['apiurl'].'details/'.$appid.'/';

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


echo "<hr><h2>Raw result</h2>";
print_array($result);


echo "<hr>More Examples :";

echo "<br>".$GLOBALS['SITE_URL']."demo_application_details.php?app=apostle-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_application_details.php?app=japanese-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_application_details.php?app=tarot-the-gypsy-spread";

?>
