<?php
$arr = array(1=>'a','b','c','d','e');
$arrjson = json_encode($arr);
var_dump($arrjson);
$a = json_decode($arrjson);
var_dump($a);