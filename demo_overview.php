<?php
require_once(__DIR__.'/mysticlib.php');
//print_array($GLOBALS);


$url=$GLOBALS['apiurl'].'overview/';

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

if(is_array(@$result['data']) and (count(@$result['data'])>0))
{
    echo "<hr><h2>Displaying Only Categories and Sub Categories</h2>";
    foreach(@$result['data'] as $entry)
    {   
        echo "<br>".ucwords(@$entry['name']);
        foreach(@$entry['children'] as $child)
        {
            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".ucwords(@$child['name']);
        } 
    }

    echo "<hr><h2>Displaying Only Categories, Sub Categories and Applications</h2>";
    foreach(@$result['data'] as $entry)
    {
        echo "<br>**********************************";
        //echo "<br>Category ID : ".@$entry['id'];
        echo "<br>Category Name : ".ucwords(@$entry['name']);
        //echo "<br>Category Image : ".@$entry['image'];
        echo "<br>Number of Direct Application in this Category : ".count(@$entry['apps']);
        if(is_array(@$entry['apps']) and count(@$entry['apps']))
        {
            foreach(@$entry['apps'] as $apps)
            {
                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Applications Name : ".ucwords(@$apps['name']);
                // echo "<br>&nbsp;&nbsp;&nbsp; Applications ID : ".@$apps['id'];
                // echo "<br>&nbsp;&nbsp;&nbsp; Applications Name : ".ucwords(@$apps['name']);
                // echo "<br>&nbsp;&nbsp;&nbsp; Application Image : ".@$apps['image'];
                // echo "<br>&nbsp;&nbsp;&nbsp; Applications Description : ".@$apps['description'];
                // echo "<br>&nbsp;&nbsp;&nbsp; Applications category : ".@$apps['category'];
            }
        }

        foreach(@$entry['children'] as $child)
        {
            //echo "<br>Child Category ID : ".@$entry['id'];
            echo "<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Child Category Name : ".ucwords(@$child['name']);
            //echo "<br>Child Category Image : ".@$entry['image'];
            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of Direct Application in this Child Category : ".@count(@$child['apps']);
            if(is_array(@$child['apps']) and count(@$child['apps']))
            {
                foreach(@$child['apps'] as $apps1)
                {
                    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Applications Name : ".ucwords(@$apps1['name']);
                    // echo "<br>&nbsp;&nbsp;&nbsp; Applications ID : ".@$apps1['id'];
                    // echo "<br>&nbsp;&nbsp;&nbsp; Applications Name : ".ucwords(@$apps1['name']);
                    // echo "<br>&nbsp;&nbsp;&nbsp; Application Image : ".@$apps1['image'];
                    // echo "<br>&nbsp;&nbsp;&nbsp; Applications Description : ".@$apps1['description'];
                    // echo "<br>&nbsp;&nbsp;&nbsp; Applications category : ".@$apps1['category'];
                }
            }
        }

    }
}
echo "<hr><h2>Raw result</h2>";
print_array($result);

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
