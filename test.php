<?php
date_default_timezone_set('America/Kentucky/Louisville');

$script_tz = date_default_timezone_get();
echo $script_tz;
$d = date("Y-m-d h:i:sa");
echo $d;