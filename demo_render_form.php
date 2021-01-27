<?php
require_once(__DIR__.'/mysticlib.php');
session_start();
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

// Get all available parameters using /render_form_inputs/ endpoint. Check  demo_render_form_requirements.php
$display_options=array();
$display_options['mysticform_name']='1';
$display_options['mysticform_name_position']='top';		//middle,top,bottom
//$display_options['mysticform_name_custom']='My Custom App Name';		//Override Application Name

$display_options['mysticform_logo']='1';
$display_options['mysticform_logo_position']='middle';		//middle,top,bottom

$display_options['mysticform_image']= '1';	
$display_options['mysticform_image_position']='bottom';	

$display_options['mysticform_banner']='1';
$display_options['mysticform_banner_position']='top';

$display_options['mysticform_title']= '1';
$display_options['mysticform_title_position']='middle';	//middle,top,bottom
//$display_options['mysticform_title_custom']='My Custom App Title';		//Override Application Form Title

$display_options['mysticform_description']='1';
$display_options['mysticform_description_position']='top'; //middle,top,bottom

$display_options['mysticform_referer']=$GLOBALS['SITE_URL'];
$display_options['mysticform_submission_page']=$GLOBALS['SITE_URL'].'demo_render_result.php';      
$display_options['mysticform_submission_newtab']='new';
$display_options['mysticform_user_sessionid']=@session_id();
$display_options['mysticform_userip']=@$_SERVER['REMOTE_ADDR'];
$display_options['mysticform_useragent']=@$_SERVER['HTTP_USER_AGENT'];

//$display_options['mystic_name']='Sourabh Swarnkar';
//$display_options['mystic_dob']='2020-11-12';
//$display_options['mystic_email']='test@gmail.com';
//print_array($display_options);
$get_params=http_build_query($display_options);

$url=$GLOBALS['apiurl'].'render_form/'.$appid.'/?'.@$get_params;

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


echo "<hr><h2>Form </h2>";
//print_array($result);
echo @$result['data'];

echo "<hr>More Examples :";


echo "<br>".$GLOBALS['SITE_URL']."demo_render_form.php?app=apostle-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_render_form.php?app=japanese-astrology";
echo "<br>".$GLOBALS['SITE_URL']."demo_render_form.php?app=tarot-the-gypsy-spread";

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="form.css">
