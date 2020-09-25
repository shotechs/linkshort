<?php

function vanityExists($vanity)
{
    $con = config::connect();
    $query = $con->prepare("SELECT * FROM urls WHERE vanity=:vanity");
    $query->bindParam(":vanity", $id) ;
    $query->execute();

    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function urlHasBeenShortened($url)
{
    $con = config::connect();
    $query = $con->prepare("SELECT * FROM urls WHERE urls=:urls");
    $query->bindParam(":urls", $url) ;
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}


function getURLID($url)
{
    $con = config::connect();
    $query = $con->prepare("SELECT vanity FROM urls WHERE urls=:urls");
    $query->bindParam(":urls", $url) ;
    $query->execute();

    return  $query->fetch(PDO::FETCH_ASSOC)['vanity'];
}


function generate_string($input, $strength = 16)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}



function insertID($url, $vanity)
{
    $con = config::connect();
    $query = $con->prepare("INSERT INTO urls (urls, vanity, sends) VALUES (:urls, :vanity, 0)");
    // $query->bindParam(":id", $id) ;
    $query->bindParam(":urls", $url);
    $query->bindParam(":vanity", $vanity);
    $success = $query->execute();
    if (config::checkSuccess($success)) {
        //  echo 'http://downloadmycode.com/short?id='.getURLID($url);
        echo '<a href="http://localhost/links/'.getURLID($url).'" target="_blank">http://localhost/links/'.getURLID($url).'</a>' ;
        echo '<br/>';
        echo '<a href="http://localhost/links/view/'.getURLID($url).'" target="_blank">http://localhost/links/view/'.getURLID($url).'</a>';
        return $success;
    } else {
        return false;
    };
}

function getUrlLocation($vanity)
{
    $con = config::connect();
    $query = $con->prepare("SELECT urls FROM urls WHERE vanity=:vanity");
    $query->bindParam(":vanity", $vanity) ;
    $query->execute();

    return  $query->fetch(PDO::FETCH_ASSOC)['urls'];
}


function userSent($vanity)
{
    if ($vanity != null) {
        $con = config::connect();
        $query = $con->prepare("UPDATE urls SET sends=sends+1 WHERE vanity=:vanity");
        $query->bindParam(":vanity", $vanity) ;
        $success = $query->execute();
        return $success;
    } else {
        return false;
    }
}

function getUrlInfo($vanity)
{
    if ($vanity != null) {
        $con = config::connect();
        $query = $con->prepare("SELECT urls, sends FROM urls WHERE vanity=:vanity");
        $query->bindParam(":vanity", $vanity) ;
        $query->execute();
        $result =$query->fetch(PDO::FETCH_ASSOC);

        $url=$result['urls'];
        //$url= $query->fetch(PDO::FETCH_ASSOC)['urls'];
        $sends= $result['sends'];
        return  "The url is ".$url."<br/> Sends to links count ".$sends;
    }
}
