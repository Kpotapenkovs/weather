    <?php


$data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");

$weatherData = json_decode($data, true);

$city = $weatherData['city']['name'];

$country = $weatherData['city']['country'];

$today = $weatherData['list'][0];


$temperature = $today['temp']['day'];

$minTemperature = $today['temp']['min'];

$maxTemperature = $today['temp']['max'];



$feelDay = $today['feels_like']['day'];

$feelNight = $today['feels_like']['night'];


$time = date('H');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php


?>
</body>
</html>
  