<?php

$server = "localhost";
$username = "customer";
$password = "Hashan1996>";
$db = "necta";

$conn = mysqli_connect( $server, $username, $password, $db );


if ( !$conn ) {
    die( 'Connection failed :' . mysqli_connect_error() );
}



?>
