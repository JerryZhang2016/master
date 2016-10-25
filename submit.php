<?php
    require_once ('MysqliDb.php');
	require_once ('dbObject.php');
	include 'sql.php';

    $item_1=htmlspecialchars($_POST['item1']);
    $item_2=htmlspecialchars($_POST['item2']);
	$item_3=htmlspecialchars($_POST['item3']);
    $item_4=htmlspecialchars($_POST['item4']);
	$item_5=htmlspecialchars($_POST['item5']);
    $item_6=htmlspecialchars($_POST['item6']);
	$item_7=htmlspecialchars($_POST['item7']);
    $item_8=htmlspecialchars($_POST['item8']);
	$item_9=htmlspecialchars($_POST['item9']);
    $item_10=htmlspecialchars($_POST['item10']);
	$item_11=htmlspecialchars($_POST['item11']);
    $item_12=htmlspecialchars($_POST['item12']);
    $item_13=htmlspecialchars($_POST['item13']);
	$item_14=htmlspecialchars($_POST['item14']);
    $item_15=htmlspecialchars($_POST['item15']);	//接收传来的数据
	
	$i=1;                                           //记数
	$cho = array();                                 //记录已投票的数据
	while($i<=15){
		if(${'item_'.$i} ==1){

			$data = Array (
			'votes' => $db->inc(1),
			);
			$db->where ('id', $i);                  //更新 相应id的 vote 字段的值
			
			$cho[$i] = 1;

		/*	if ($db->update ('app_vote', $data))
				echo $db->count . ' records were updated';
			else
				echo 'update failed: ' . $db->getLastError();
		*/	
		}else
			$cho[$i] = 0;
			
		$i =$i+1;
	}
	
	function getIP()                                        //皮卡用的 获取IP
	{ 
		if (isset($_SERVER)) 
		{ 
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 		 
				$realip = $_SERVER['HTTP_X_FORWARDED_FOR']; 			
			elseif (isset($_SERVER['HTTP_CLIENT_IP'])) 			
				$realip = $_SERVER['HTTP_CLIENT_IP']; 			
			else 			
				$realip = $_SERVER['REMOTE_ADDR']; 			 
		} 
		else 
		{ 
			if (getenv("HTTP_X_FORWARDED_FOR")) 			
				$realip = getenv( "HTTP_X_FORWARDED_FOR"); 			
			elseif (getenv("HTTP_CLIENT_IP")) 			
				$realip = getenv("HTTP_CLIENT_IP"); 		
			else			
				$realip = getenv("REMOTE_ADDR"); 			
		} 
	return $realip; 
	}
	
	$ip = Array ("ip" => $realip);
	$id = $db->insert ('ip', $ip);                        //记录已投票ip
?>