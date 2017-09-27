<?php
    $conn = oci_connect('alsea', 'alsea2017', '192.168.15.41:1521/alseaPDB','AL32UTF8');
    if (!$conn) 
    {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }
?>
