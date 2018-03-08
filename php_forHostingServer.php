<?php
    $db = mysqli_connect("nrk.mysql.ukraine.com.ua","nrk_fond","30041986");
    $db->set_charset('utf8');
    if (!$db) 
    { 
       printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
       exit; 
    } 
?>