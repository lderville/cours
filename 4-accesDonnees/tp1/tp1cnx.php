<?php
try {
    $chaineCnx = 'mysql:host=bpbukh41fqvikukr5pt2-mysql.services.clever-cloud.com;dbname=bpbukh41fqvikukr5pt2';
    $pdo = new PDO($chaineCnx, 'ucitw2mcqnjtdn6b', 'w82VHv9qqotSYVNh4zXy', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}
