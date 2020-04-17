<?php
    $url = 'http://api.openweathermap.org/data/2.5/weather?lat=58.24806&lon=22.50389&appid=44a18a01649f13fcae66f93b4f3e6af7';
    $cacheFile = './cache.json';
    $cacheTime = 300;

    if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime ) {
        $content = file_get_contents($cacheFile);
    } else {
        $content = file_get_contents($url);

        $file = fopen($cacheFile, 'w');
        fwrite($file, $content);
        fclose($cacheFile);
    }

    // $content = file_get_contents($url);

    // $file = fopen($cacheFile, 'w');
    // fwrite($file, $content);
    // fclose($cacheFile);

    $json = json_decode($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenWeatherMap</title>
</head>
<body>
    <img src="https://openweathermap.org/img/wn<?php echo $json->weather[0]->icon;?>$2x.png">
    <div class="desc"><?php echo $json->weather[0]->description;?></div>    
</body>
</html>