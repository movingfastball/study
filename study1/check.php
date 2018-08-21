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

if($nickname=='')
{
	print'ニックネームが入力されていません<br/>';
}
else
{
	print'ようこそ';
	print$nickname;
	print'様';
	print'<br/>';
}

if($email=='')
{
print'メールアドレスが入力されていません<br/>';
}else{
	print'メールアドレス';
	print$email;
	print'<br/>';

}

if($goiken=='')
{
	print'ご意見が入力されていません。<br/>';
}
else
{
	print'ご意見『';
	print$goiken;
	print'』<br/>';
}


if($nickname==''||$email==''||$goiken=='')
{
	print'<form>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</from>';
}
else
{
print'<form method="post" action="thanks.php">';

print'<input name="nickname" type="hidden" value="'.$nickname.'">';
print'<input name="email"type="hidden" value="'.$email.'">';
print'<input name="goiken" type="hidden" value="'.$goiken.'">';
print'<input type="button" onclick="history.back()" value="戻る">';
print'<input type="submit" value="OK">';
print'</form>';
}

?>

</body>
</html>