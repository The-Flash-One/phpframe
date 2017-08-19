<?php
$id = $_GET ['id'];
$pdo = new PDO ( 'mysql:host=localhost;dbname=ecms', 'root', '' );
$sql = 'select cmt_num from article where id=:id';
$stmt = $pdo->prepare ( $sql );
$stmt->bindValue ( ':id', $id );
$stmt->execute ();
$row = $stmt->fetch();
echo $row['cmt_num'];
