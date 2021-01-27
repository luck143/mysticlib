<?php
require_once(__DIR__.'/mysticlib.php');
require_once(__DIR__.'/formmakerlib.php');
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
$url=$GLOBALS['apiurl'].'inputs/'.$appid.'/';

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

echo "<hr><h2>Application Requirements</h2>";
print_array($result);

echo "<hr><h2>Demo Form Make using the above requirements :</h2>";
echo $form=form_render($result['data'],$appid);


echo "<hr><h2>More Examples :</h2>";
echo "<br>".$GLOBALS['SITE_URL']."demo_application_inputs.php?app=apostle-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_application_inputs.php?app=japanese-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_application_inputs.php?app=tarot-the-gypsy-spread";

?>
<link rel="stylesheet" href="form.css">