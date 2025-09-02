<?php
$data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");

$weatherData = json_decode($data, true);

echo "city: " .$weatherData['location']['city'];
  