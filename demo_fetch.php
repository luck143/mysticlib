<?php
require_once(__DIR__.'/mysticlib.php');
//print_array($GLOBALS);

// Get all available parameters using /fetch/requirements/ endpoint. Check demo fetch_requirements.php
$param=array();
$param['columns']='all';  //display all columns 
$param['page']='1';  //pagination
$param['name']='tarot';  //search application Name

$get_params = http_build_query($param);
$url=$GLOBALS['apiurl'].'fetch/?'.@$get_params;

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

echo "<br>Total Applications in the API : ".@$result['data']['total'];
echo "<br>Total Pages : ".@$result['data']['totalpages'];
echo "<br>Current Page : ".@$result['data']['currentpage'];

if(is_array(@$result['data']['data']) and (count(@$result['data']['data'])>0))
{
    foreach(@$result['data']['data'] as $entry)
    {
        echo "<br>**********************************";
        echo "<br>Applications ID : ".@$entry['id'];
        echo "<br>Applications Name : ".ucwords(@$entry['name']);
        echo "<br>Application Image : ".@$entry['image'];
        echo "<br>Applications Description : ".@$entry['description'];
        echo "<br>Applications category : ".implode(@$entry['category']);
    }
}

echo "<hr><h2>Raw result</h2>";
print_array($result);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
