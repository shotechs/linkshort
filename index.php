<?php

include $_SERVER['DOCUMENT_ROOT'].'/links/routes/route.php';
include $_SERVER['DOCUMENT_ROOT'].'/links/src/about.php';
include $_SERVER['DOCUMENT_ROOT'].'/links/src/home.php';
include $_SERVER['DOCUMENT_ROOT'].'/links/src/contact.php';
include $_SERVER['DOCUMENT_ROOT'].'/links/src/link.php';

$route=new Route();



$route->add('/', 'Home');
$route->add('/about', 'About');
$route->add('/contact', 'Contact');
$route->add('/link', 'Link');

$vanity = $route->submit();
$word = "view";
if (
    (strpos($vanity, $word) !== false)
) {
    $vanity=str_replace("/view/", "", $vanity);
    include $_SERVER['DOCUMENT_ROOT'].'/links/includes/config.php';
    include $_SERVER['DOCUMENT_ROOT'].'/links/short/includes/functions.php';

  

    echo getUrlInfo($vanity);
} elseif (
    ($vanity !== null)
) {
    $vanity=trim($vanity, '\/');
    //echo $vanity;
    include $_SERVER['DOCUMENT_ROOT'].'/links/includes/config.php';
    include $_SERVER['DOCUMENT_ROOT'].'/links/short/includes/functions.php';

    echo $vanity;
    echo userSent($vanity);
    $url = getUrlLocation($vanity);
    header('Location: '.$url);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
      <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMTYuOTQ5IDcuMDUxYy4zOS4zODkuMzkxIDEuMDIyLjAwMSAxLjQxM2wtOC40ODUgOC40ODZjLS4zOTIuMzkxLTEuMDIzLjM5MS0xLjQxNCAwLS4zOS0uMzktLjM5LTEuMDIxLjAwMS0xLjQxMmw4LjQ4NS04LjQ4OGMuMzktLjM5IDEuMDI0LS4zODcgMS40MTIuMDAxem0tNS44MDUgMTAuMDQzYy0uMTY0Ljc1NC0uNTQxIDEuNDg2LTEuMTQ2IDIuMDg4bC0xLjY2IDEuNjZjLTEuNTU1IDEuNTU5LTMuOTg2IDEuNjYzLTUuNDEzLjIzNS0xLjQyOS0xLjQyOC0xLjMyMy0zLjg1Ny4yMzQtNS40MTNsMS42NjEtMS42NjNjLjYwMy0uNjAxIDEuMzM0LS45OCAyLjA4Ny0xLjE0NGwxLjkzNC0xLjkzNGMtMS44MTctLjMwNi0zLjgyOS4yOTUtNS4zMTMgMS43ODNsLTEuNjYyIDEuNjYxYy0yLjM0MiAyLjM0LTIuNSA1Ljk3OC0uMzU0IDguMTIzIDIuMTQ1IDIuMTQ2IDUuNzgzIDEuOTg1IDguMTIzLS4zNTRsMS42Ni0xLjY2YzEuNDg2LTEuNDg3IDIuMDg5LTMuNDk2IDEuNzgzLTUuMzE0bC0xLjkzNCAxLjkzMnptMy4yMjItMTUuMjMxbC0xLjY2IDEuNjZjLTEuNDg2IDEuNDg4LTIuMDg5IDMuNDk5LTEuNzgzIDUuMzE3bDEuOTM1LTEuOTM1Yy4xNjItLjc1My41NC0xLjQ4NSAxLjE0Ni0yLjA4N2wxLjY2LTEuNjZjMS41NTYtMS41NTkgMy45ODQtMS42NjMgNS40MTMtLjIzNCAxLjQyOSAxLjQyNyAxLjMyNCAzLjg1Ny0uMjMzIDUuNDE1bC0xLjY2IDEuNjZjLS42MDIuNjAzLTEuMzM0Ljk4MS0yLjA4OSAxLjE0NWwtMS45MzQgMS45MzRjMS44MTguMzA2IDMuODI3LS4yOTUgNS4zMTctMS43ODNsMS42NTgtMS42NjJjMi4zNC0yLjMzOSAyLjQ5OC01Ljk3Ni4zNTQtOC4xMjEtMi4xNDUtMi4xNDYtNS43OC0xLjk4Ny04LjEyNC4zNTF6Ii8+PC9zdmc+">
      &nbsp;&nbsp;
        <strong> URL Shortener</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
    <div class="container">

<?php
//echo $vanity;
if ($vanity =='') {?>

<form class="needs-validation mx-auto" style="width: 600px; margin-top: 25px;" novalidate>
        <div class="row">
          <div class="col-md-12 mb-6">

     <label for="url">url</label>
    <input type="text"  class="form-control" required name="url" id="url" placeholder="https://www.google.com/"><br/><br/>
    <label for="vanity">vanity link with 5-9 letters</label>
    <input type="text" class="form-control" required name="vanity" placeholder="google" id="vanity"><br/><br/>
    <input  class="btn btn-primary btn-lg btn-block" type="submit" value="Shorten My URL!">
    </form>
    <p class="errors"></p>
    </div>
    <script>
$(document).ready(function(){
  $("input[type='submit']").click(function(e){
      e.preventDefault();
      $('.errors').html('');
      var url = $('input[name="url"]').val();
      var vanity = $('input[name="vanity"]').val();
      if(url.length == 0){
          $('.errors').html('Whoops! Please enter a URL!');
          return false;
      }

      if((vanity.length < 5 || vanity.length > 9)){
          $('.errors').html('Whoops! Please enter a 5-9 letters in the vanity field!');
          return false;
      }


      if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#url").val())){
   // return true;
} else {
    alert("invalid URL");
    return false;
}

$.post('./short/includes/process.php',{
    url: url,
    vanity: vanity
}, function(data, textStatus, xhr){
    //$('.errors').html('<a href="'+data+'"target="_blank">'+data+'</a>');
    $('.errors').html(data);
});

  });
});
</script>
<?php } ?>



</body>
</html>