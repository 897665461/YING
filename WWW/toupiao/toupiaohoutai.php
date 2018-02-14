<?php
           $id = $_GET['id'];
$dsn = "mysql:host=localhost;dbname=toupiao";
$pdo = new PDO($dsn,"root","root");
$pdo->exec("update toupiao_xinxi set piaoshu=100 WHERE id='5'");
echo 8976;