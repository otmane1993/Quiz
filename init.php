<?php
    include './config/config.php';
    $conn=new mysqli(SERVERNAME,USERNAME,PASSWORD,DBNAME);
    if($conn->connect_error)
    {
        die("Il y'a erreur".$conn->connect_error);
    }
?>