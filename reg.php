<!DOCTYPE HTML>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>用户注册</title>

<body>
<form action="reg.php"  method="post">
昵称 <input name="nick" type="text" id="nick"/></br>
密码 <input name="password" type="text" id="password"/></br>
<input name="ok" type="submit" value="提交"/>
</form>

<?php
	include"common.inc.php";
	function Checknick($nick)
	{
		global $LOGIN;
		$sql="select _nick from $LOGIN where _nick='$nick'";
		$a=MySQL_query($sql);
		$row=MySQL_fetch_array($a);
		$niker=$row["_nick"];
		
		return $nick;
	}

	function AddUser()
	{
		global $LOGIN;
		global $id,$nick,$password;
		$sql="insert into $LOGIN values('','$nick','$password')";
		MySQL_query($sql);
		$b="select * from $LOGIN where 
		_nick='$nick'";
		$result=MySQL_query($b);
		$row=MySQL_fetch_array($result);
		$id=$row[id];
		$password=$row[password];
}

if($ok)
	{		
		if(!$nick)
		{
			echo "用户昵称不能为空！";	
			return 0;	
		}
		if(Checknick($nick))
		{	
			echo "用户名已经存在！";	
			return 0;	
		}
	
		AddUser();
		
		header("Location:on_ok.php?id=$id&pws=$password");	
		
	}
?>



</body>
</html>

