<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改logs页面</title>
<style>
    form{
        padding:0px;
        margin:0px;
    }
    table{
        font-size:24px;
        padding:10px;
    }
    div{
        width:800px;
        height:500px;
        margin:50px auto;
        padding:10px;
        border:2px solid black;
    }
</style>
</head>

<body>
<?php 
include ("conn.php");
mysqli_query($conn, "set names UTF-8");
$logid=$_GET["logid"]; //先接收从logs.php传过来的ID值以确定要修改的Logs信息
$query = "select * from logs where logid=?"; 
// $res = @mysqli_query($conn,$query) or die(mysqli_error($conn));
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $logid); //假设logid是一个字符串，根据需要进行调整
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$dbrow=mysqli_fetch_array($res);
$logid=$dbrow['logid']; 
$who=$dbrow['who']; 
$table_name=$dbrow['table_name'];  
$operation=$dbrow['operation'];
$key_value=$dbrow['key_value'];
?>

<div>
<table width="70%" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="font-size:28px;">请填写要修改的Logs信息</td>
    </tr>
</table>
<form action="save_edit_logs.php" method="post"> <!---把内容传到save_edit_logs.php 保存-->
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="10">
    <tr>
        <td width="40%" align="right">logid</td>
        <td width="60%" align="left"><input type="text" name="logid" size="40" style="height:25px" 
            value="<?php echo $logid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">who</td>
        <td width="60%" align="left"><input type="text" name="who" size="40" style="height:25px" 
            value="<?php echo $who;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">table_name</td>
        <td width="60%" align="left"><input type="text" name="table_name" size="40" style="height:25px" 
            value="<?php echo $table_name;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">operation</td>
        <td width="60%" align="left"><input type="text" name="operation" size="40" style="height:25px" 
            value="<?php echo $operation;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">key_value</td>
        <td width="60%" align="left"><input type="text" name="key_value" size="40" style="height:25px" 
            value="<?php echo $key_value;?>"/></td>
    </tr>
</table>

<table width="70%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
        <!----这里很重要,以隐藏方式把ID值也传到save_edit_logs.php文,以确定更新的具体是哪条Logs信息--->
	    <input type="hidden" name="logid" value="<?php echo $logid; ?>" /> 
	    <input type="submit" name="submit1" value="确定修改"/></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
