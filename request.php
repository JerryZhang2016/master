<?php 
    require_once ('MysqliDb.php');
	require_once ('dbObject.php');
	include 'sql.php';
	include 'judge_1.php';
	
    $cols = Array ("id", "name", "description", "imgPath");      
    $datas = $db->get ("app_vote", null, $cols);          //从数据库中查询id 名字 描述 图片路径
    
	
//	$id = $db->get('app_vote');
    echo json_encode($status);       //转换为json
	echo json_encode($title);
    echo json_encode($datas);
?>