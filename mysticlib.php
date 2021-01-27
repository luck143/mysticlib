<?php
$GLOBALS['apihost']='astrology5.p.rapidapi.com';
$GLOBALS['apikey']='ADDYOURAPIKEY';
$GLOBALS['apiurl']='https://'.$GLOBALS['apihost'].'/';
$GLOBALS['rapidapi_header']=[
    "x-rapidapi-host: ".$GLOBALS['apihost'],
    "x-rapidapi-key: ".$GLOBALS['apikey']
    ];


$host="http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://";
$GLOBALS['SITE_URL']=$host.$_SERVER['HTTP_HOST']."/";
$GLOBALS['FULL_URL']=$host.$_SERVER['HTTP_HOST'].@$_SERVER['REQUEST_URI'];

function curl_get($url,$header)
{    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => $header,
    ]);

    $response = curl_exec($curl);
    $GLOBALS['curl_result']=curl_getinfo($curl);
    $GLOBALS['curl_error'] = curl_error($curl);

    curl_close($curl);

    if($GLOBALS['curl_result']['http_code']==200)
	{
		return $response;
	}
	else
	{
        if ($GLOBALS['curl_error'])
        {
            echo "cURL Error #:" . $GLOBALS['curl_error'];
            exit;
        }
        else
        {
            return $response;
        }
	}
   
}

function curl_post($url,$header,$payload)
{    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_POSTFIELDS =>@$payload
    ]);

    $response = curl_exec($curl);
    $GLOBALS['curl_result']=curl_getinfo($curl);
    $GLOBALS['curl_error'] = curl_error($curl);

    curl_close($curl);

    if($GLOBALS['curl_result']['http_code']==200)
	{
		return $response;
	}
	else
	{
        if ($GLOBALS['curl_error'])
        {
            echo "cURL Error #:" . $GLOBALS['curl_error'];
            exit;
        }
        else
        {
            return $response;
        }
	}
   
}

function printtext($str)
{
	if(is_array($str))
	{
		echo "<pre>".print_array($str)."</pre>";
	}
	else
	{		
		echo "<br><textarea class='form-control' rows='4' cols='100%'>".htmlentities($str)."</textarea><br>";
	}
	
}	

function print_array($array)
{
	echo "<br><br><pre>";
	print_r($array);
	echo "</pre><br>";
}