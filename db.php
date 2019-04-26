<?php

$connection = pg_connect("host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=dh3jhu4k5luso user=vdtzjrzlufxdrq password=f64867f67bb01c58a833bba964f31eb70d76cbd0581f4c121475047bea4da0bd");  
 if(!$connection) {
     die("Database connection failed");
 }

 ?>
