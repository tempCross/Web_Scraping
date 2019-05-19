<?php
# Initialization
include("LIB_parse.php");
include("LIB_http.php");
include("LIB_mysql.php");
connect_to_database();
$data_array['NAME']  = "Craig";
$data_array['CITY']  = "Applegate";
$data_array['STATE'] = "CA";
$data_array['ZIP']   = "55410";
insert(DATABASE, $table="people", $data_array);
?>