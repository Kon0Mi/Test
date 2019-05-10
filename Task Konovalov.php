<div style="font-size:22pt">
<?php 

function GetContentByURL( $URL ) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);				// указываем URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // возвращает веб-страницу
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);// указываем отсутствие SSL сертификата
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);						// вызываем сUrl
curl_close($ch);								// закрываем соединение
return $result;									// возвращаем полученную страницу
}


$contentOne = GetContentByURL("https://dog.ceo/api/breeds/image/random"); // первое апи
echo "API: Dog - случайные фото собак<br>";
$Dog = json_decode($contentOne, true);
if ($Dog["status"] == "success") {
	$UrlDog = $Dog["message"];
	echo "Вот вам случайная собачка: <br>";
	echo "<img src=\"".$UrlDog."\"><br>";
}
else {
	echo "Ошибка! Собаки не будет( Статус: ";
	echo $Dog["status"];
}

echo "Ну и заодно котика с \"недоAPI\" placekitten: <br>";
echo '<img src="https://placekitten.com/'.rand(200,300).'/'.rand(200,300).'"><br>';

$contentTwo = GetContentByURL("https://api.opendota.com/api/heroes"); // второе апи

$heroes = json_decode($contentTwo, true);
$heroOne = $heroes[rand(0,100)];// выборка трех случайных героев 
$heroTwo = $heroes[rand(0,100)];
$heroThree = $heroes[rand(0,100)];

echo "<br>API: OpenDota - информация о вселенной Defense Of The Ancient 2<br>";
echo "Теперь парочка героев из доты 2: <br>";
echo "Имя: ".$heroOne["localized_name"].", основной атрибут: ".$heroOne["primary_attr"].", тип атаки: ".$heroOne["attack_type"]."<br>";
echo "Имя: ".$heroTwo["localized_name"].", основной атрибут: ".$heroTwo["primary_attr"].", тип атаки: ".$heroTwo["attack_type"]."<br>";
echo "Имя: ".$heroThree["localized_name"].", основной атрибут: ".$heroThree["primary_attr"].", тип атаки: ".$heroThree["attack_type"]."<br>";

$contentThree = GetContentByURL("http://numbersapi.com/random/year?json"); // третье апи

$year = json_decode($contentThree,true);
echo "<br>API: Numbers year - интересные факты о годах <br>";
echo $year["text"]."<br>";

$contentFour = GetContentByURL("http://numbersapi.com/random/math?json"); // четвертое апи

$math = json_decode($contentFour,true);
echo "<br>API: Numbers mathematic - интересные факты о числах<br>";
echo $math["text"]."<br>";

$contentFive = GetContentByURL("https://datazen.katren.ru/calendar/day/"); // пятое апи

$day = json_decode($contentFive,true);
echo "<br>API: Datazen.katren - сегодня(".$day["date"].") выходной? <br>";
if ($day["holiday"]) echo "Да, можно расслабиться)<br>";
else echo "Нет, иди паши(<br>";


echo "<br>Спасибо за просмотр!!!";
?>
</div>