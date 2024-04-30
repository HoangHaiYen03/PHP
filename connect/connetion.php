<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "ktra2php";
    $connect = new mysqli($server,$user,$password,$dbname);
    if($connect->connect_error){
        echo "Connect Error". $connect->connect_error;
    }
?>