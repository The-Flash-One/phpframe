<?php
header("content-type:text/html;charset=UTF-8");
date_default_timezone_get('Asia/Shanghai');
$id = $_POST['id'];
$content = $_POST['content'];
//敏感词
$words = '他妈的';

if(mb_strpos($content,$words) !== false){
	exit;
}


$pdo = new PDO ( 'mysql:host=localhost;dbname=ecms', 'root', '' );



$sql = 'insert comment(cmt_content,mem_id,art_id,add_time) values(:cmt_content,:mem_id,:art_id,:add_time)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':cmt_content', $content);
//应该是当前登录用户的ID
$stmt->bindValue(':mem_id', 3);
$stmt->bindValue(':art_id', $id);
$stmt->bindValue(':add_time', time());
$stmt->execute();

//////////////////////////////

$sql = 'update article set cmt_num = cmt_num + 1 where id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();

////////////////////////////////////
$sql = 'select id,mem_name,mem_face from member where id=:id';
$stmt = $pdo->prepare($sql);
//应该是当前登录用户的ID
$stmt->bindValue(':id', 3);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$row['content'] = $_POST['content'];
//

$json = json_encode($row);

echo $json;










