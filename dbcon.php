<?php

$db = mysqli_connect("localhost","root","","aralin_baybayin1");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>