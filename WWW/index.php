<?php
$curl = curl_init("https://daohang.qq.com/?fr=hmpage");
curl_exec($curl);
var_dump($curl);
curl_close($curl);







?>