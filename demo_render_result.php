<?php
require_once(__DIR__.'/mysticlib.php');
session_start();
//print_array($_REQUEST);


if(strlen(@$_REQUEST['mystic_submit'])>0)
{
    $mystic_payload=array();
    foreach(@$_REQUEST as $key=>$val)
    {
        if(strpos(@$key,'mystic_') !== false){
            $mystic_payload[@$key]=@$val;
        }
    }
    //print_array($mystic_payload);
    $app = $mystic_payload['mystic_app'];
    
    $url=$GLOBALS['apiurl'].'render_result/'.$app.'/';
    echo "<br> Calling API Endpoint : " .@$url;

    $payload=json_encode(@$mystic_payload);
    echo "<br> Payload : " .@$payload;
    
    $response=curl_post($url,$GLOBALS['rapidapi_header'],@$payload);
    $result=json_decode(@$response,true);
    if(is_array($result))
    {
        //print_array($result);
        //exit;
    }
    else
    {
        echo "<br> Error : " .$result;
        exit;
    }
    ?>								
    <h1>Result : </h1>
    <?php echo @$result['data'];?>
    
    <?php
}
else
{
    ?>
    <h1>This page cant be Accessed Directly. </h1>
    <p>
        <font color="#999999" size="2">Go to Home Page <a href="<?php echo @$GLOBALS['SITE_URL'];?>">click here</a></font>
    </p>			

    <?php
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="generic.css">
<link rel="stylesheet" href="result.css">