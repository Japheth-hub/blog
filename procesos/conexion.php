<?php

$server="localhost";
$username="root";
$password="";
$database="blog_coches";

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAME 'utf8'");

//inciamos una session
if(!isset($_SESSION)){
    session_start();
}