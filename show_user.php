<?php
require "../database_connection.php";
$name_table = "users";
//Получение ID показываемого пользователя
$user_id = $_REQUEST['user_id'];
//Создание инструкции SELECT
$select_query = "select * from {$name_table} where user_id = {$user_id}";
$result = mysql_query($select_query);
if ($result) {
  # Получение возращенных строк с помощью $result
  //Разбиение строки на имеющиеся в ней разные поля и присваивание значений
  //переменным
  $row = mysql_fetch_array($result);
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  $email = $row["email"];
  $facebook_url = $row["facebook_url"];
  $twitter_handle = $row["twitter_handle"];
  $bio = $row["bio"];

  //Для последующего добавления
  $user_image = "/еще/не/созданное_изображение.jpg";
}
else {
  die("Ошибка обнаружения пользователя с ID {$user_id}");
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project1</title>
</head>
<body>
  <div id="header">
    <h1>PHP & MySQL: Dinamical pages</h1>
  </div>
  <div id="content">
    <div class="user_profile">
      <h1><?php echo $first_name . " ".$last_name; ?> </h1>
      <p>
        <img src="<?php echo $user_image;?>" alt="user_foto" class="user_pic">
        <?php echo $bio ?>
      </p>

      <p class="contact_info">
        Поддерживайте связь с <?php echo $first_name; ?>
      </p>
      <ul>
        <li>...
          <a href="<?php echo $email; ?>">по электронной почте</a>
        </li>
        <li>... путем
          <a href="<?php echo $facebook_url; ?>">посещения его страницы на Facebook</a>
        </li>
        <li>... путем
          <a href="<?php echo $twitter_handle; ?>">отслеживания его сообщений в Twitter</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer"></div>
</body>
</html>
