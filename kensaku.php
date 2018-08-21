<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHP基礎</title>
</head>
<body>
<?php
$code=$_POST['code'];

//DB接続定義
$db_user ="root";
$db_pass ="";
$db_host ="localhost";
$db_name ="phpkiso";
$db_type ="mysql";


//DSN組み立て
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

//DB接続
try{

$pdo = new PDO($dsn,$db_user,$db_pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

print '接続に成功しました<br/>';

}catch(PDOException $Exception){
die('接続エラー:'.$Exception->getMessage());
}

$sql = 'SELECT * FROM anketo WHERE code=?';
$stmh = $pdo->prepare($sql);
$data[]=$code;
$stmh->execute($data);

while($row= $stmh->fetch(PDO::FETCH_ASSOC)){
	
	if($row==false)
	{
		break;
	}
	print $row['code'];
	print $row['nickname'];
	print $row['email'];
	print $row['goiken'];
	print '<br/>';
}

//DB切断
$pdo =null;







?>
</body>
</html>