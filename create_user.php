<?php
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$facebook_url = str_replace("facebook.org", "facebook.com",
                            $_REQUEST['facebook_url']);
// $position = strpos($facebook_url, "facebook.com");
$reg = "/\s*facebook.com/";
$match = preg_match($reg, $facebook_url);
if(!$match){
  $facebook_url = "http://www.facebook.com/".$facebook_url;
}
$twiter_handle = $_REQUEST['twiter_handle'];
$twiter_url = "http://www.twitter.com/";
// $position = strpos($twiter_handle, "@");
$reg = "/^\s*@/";
$match = preg_match($reg, $twiter_handle);
if (!$match) {
  $twiter_url = $twiter_url . $twiter_handle;
}
else {
  $twiter_url = str_replace('@',$twiter_url,$twiter_handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Сервер</title>
</head>
<body>
  <div id="header">
    <h1>PHP & MySQL: Dinamical pages</h1>
  </div>


  <div id="content">
    <p>Это запись той информации, которую вы отправили:</p>
    <p>
      Имя: <?php echo $first_name.' '.$last_name ; ?><br>
      Адрес электронной почты: <?php echo $email; ?><br>
      <a href=<?php echo $facebook_url; ?>>URL-адрес в Facebook</a><br>
      <a href=<?php echo $twiter_url;?>>Индентификатор в Twitter</a><br>
    </p>
  </div>
  <div class="test">

    <?php
      echo '<h4>Что храниться в $_REQUEST</h4>';
      echo "<hr>";
      foreach ($_REQUEST as $key => $value) {
        print("<p>"."Значение для <span id ='key'>".$key."</span>: <span id ='value'>".$value."</span></p>");
      }

     ?>
  </div>
  <a class="back" href="create_user.html">Back</a>
  <div class="footer"></div>
</body>
</html>
