<?php
$start = microtime(true);
if (isset($_GET['x'])) $x = $_GET['x'];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['r'])) $r = $_GET['r'];
$check = false;
$fail = "";
$y = preg_replace("/,/", ".", $y);
if (!(is_numeric($x))) $fail .= "Некорректное значение X\n";
else if ($y<-5 || $y>3 || !is_numeric($y)) $fail .= "Некорректное значение Y\n";
else if (!is_numeric($r) || $r <= 0) $fail .= "Некорректное значение R";
if ($fail != "") die($fail);
if ($x>=0 && $x<=$r && $y<=0 && $y>=-$r) $check=true;


else if ($x>=0 && $y>=0 && $y>=-($x+$r)/2) $check=true;

else if ($x<=0 && $y>=0 && $x*$x + $y*$y <= $r*$r) $check=true;



$finish = microtime(true);
$time = number_format($finish-$start,6);

$dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));
$hit = "false";
if ($check){
    $hit = "true";
}
echo "<tr><td>".$x."</td><td>".$y."</td><td>".$r."</td><td>".$hit."</td></tr>";
/*if ($check){

    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " лежит в заданной области<br>Текущее время: " . $dt->format('H:i:s'). "<br> Время выполнения скрипта: ". $time . " с</center>";
}
else {
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " не лежит в заданной области<br>Текущее время: " . $dt->format('H:i:s'). "<br> Время выполнения скрипта: ". $time . " с</center>". "<br>";
}*/

?>
