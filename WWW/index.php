<?php

$redis = new Redis();

$redis->connect('127.0.0.1',6379);
$redis->select(1);
$redis->set('string','hello redis');

echo $redis->get('string');
