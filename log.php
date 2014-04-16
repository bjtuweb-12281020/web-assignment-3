
<!DOCTYPE HTML>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>用户登录</title>

<head>

</head>

<body>

<form action="log.php" method="post">
昵称 <input name="nick" type="text" id="nick"/></br>
密码 <input name="password" type="text" id="password"/></br>
<input name="ok" type="submit" value="登录"/>
</form>

<?php
	include"common.inc.php";
	function CheckNick($nick_input)
	{
		global $LOGIN;
		global $nick,$id;
		$sql="select * from $LOGIN where _nick='$nick_input'";
		$result=MySQL_query($sql);
		$row=MySQL_fetch_array($result);
		$id=$row["id"];
		$nicker=$row["_nick"];
		if(!$row["_nick"]) 
		{return "error!";}
	}

	function User_Password($id)
	{
		global $LOGIN;
		$sql="select _password from $LOGIN where id='$id'";
		$result=MySQL_query($sql);
		$row=MySQL_fetch_array($result);
		return ($row["_password"]);
	}

	if($ok)
	{
		if((!isset($error)) and (CheckNick($nick)))
		{
			echo "该昵称不存在！";
			return 0;
		}
		if(!isset($error))
		{
			$p=User_Password($id);
			if($password!=$p)
			{$error="密码不正确";}
			header("Location:log_ok.php?ok_info=恭喜您登录成功！");
		}
	}
?>

</body>
</html>

