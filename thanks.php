<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHP基礎</title>
</head>
<body>
<?php

$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

$nickname=htmlspecialchars($nickname);
$email=htmlspecialchars($email);
$goiken=htmlspecialchars($goiken);

print$nickname;
print'様<br/>';
print'ご意見ありがとうございました<br/>';
print'頂いたご意見『';
print$goiken;
print'』<br/>';
print$email;
print'にメールを送りましたのでご確認ください<br/><br/>';



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

print '接続に成功しました';

}catch(PDOException $Exception){
die('接続に失敗しました');
}

//データ挿入
try{
$pdo->beginTransaction();
$sql = "INSERT INTO anketo(nickname,email,goiken)VALUES(:nickname,:email,:goiken)";
$stmh = $pdo->prepare($sql);
$stmh->bindValue(':nickname',$_POST['nickname'],PDO::PARAM_STR);
$stmh->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
$stmh->bindValue(':goiken',$_POST['goiken'],PDO::PARAM_STR);
$stmh->execute();
$pdo->commit();

print"データを".$stmh->rowCount()."件、挿入しました。<br>";
print'データベースの登録状況観ますか？<br>';
print'<form method="post" action="ichiran.php">';
print'<input type="submit" value="はい"><br>';
print'ホーム画面に戻りますか？<br>';
print'<input type="button" onclick="history.back()" value="戻る"><br>';

}catch(PDOException $Exception){
$pdo->rollBack();
print"エラー:".$Exception->getMessage();
}
//DB切断
$pdo =null;



?>

</body>
</html>