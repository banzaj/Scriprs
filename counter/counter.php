<?php


if(isset($_COOKIE['count'])) {
    
    $value = $_COOKIE['count'];
    
    $value++;
    
    setcookie("count", $value, time()+3600*24);// 24 hour

    file_put_contents("counter.txt",$value);
    
    $count = file_get_contents("counter.txt");
    
    
    echo "Вы посетили эту страницу $count раз" ;
    
}  else {

setcookie("count", "1", time()+3600*24);// 24 hour

}





?>

