<?php
    $con = new mysqli("localhost","root","12345678","projectq");
    if($con->connect_error) {
        die("Connect fail : ".$con->connect_error);
    }
        