<?php

$host='127.0.0.1:3307';
$username='root';
$password='';
$database='showroom_vira_table';

$koneksi = mysqli_connect($host,$username,$password,$database);

if(!$koneksi){
    die("Failed to connect to database");
}

?>