<?php

if (file_exists("news.txt")){
    $myData = file_get_contents("news.txt");
}
 echo $myData;

?>
