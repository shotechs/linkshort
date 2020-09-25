<?php
include $_SERVER['DOCUMENT_ROOT'].'/links/includes/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/links/short/includes/functions.php';

  //make string 5-9
 // $randNum = rand(5, 15);
 // $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
 // $id = generate_string($permitted_chars, $randNum);

$url = $_POST['url'];
$vanity = $_POST['vanity'];




if (urlHasBeenShortened($url)) {
    //  echo 'http://downloadmycode.com/short?id='.getURLID($url);
    $link = getURLID($url);
    echo '<a href="http://localhost/links/'.$link.'" target="_blank">http://localhost/links/'.$link.'</a><br/><a href="http://localhost/links/view/'.$link.'" target="_blank">http://localhost/links/view/'.$link.'</a>' ;
} else {
    insertID($url, $vanity);
}
