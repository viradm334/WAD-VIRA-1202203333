<?php

$host='127.0.0.1:3307';
$username='root';
$password='';
$database='showroom_vira_table';

$koneksi = mysqli_connect($host,$username,$password,$database);
$koneksi2 = mysqli_connect('127.0.0.1:3307', 'root', '', 'wad_modul4');

if(!$koneksi){
    die("Failed to connect to database");
}

if(!$koneksi2){
    die("Failed to connect to second database");
}
?>