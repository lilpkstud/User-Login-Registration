<?php
    /**
     * Grabbing DotENV to control my .env variables
     */
    require($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::create(__DIR__, '/../.env');
    $dotenv->load();

    $username = getenv('connectionUsername'); 
    $password = getenv('connectionPassword'); 
    $host = getenv('connectionHost'); 
    $dbname = getenv('connectionDbName'); 

    $conn = mysqli_connect($host, $username, $password, $dbname);
   
    session_start();

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }