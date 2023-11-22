<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改suppliers页面</title>
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
        height:400px;
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
$sid=$_GET["sid"]; //先接收从suppliers.php传过来的ID值以确定要修改的Suppliers信息
$query = "select * from suppliers where sid=?"; 
// $res = @mysqli_query($conn,$query) or die(mysqli_error($conn));
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $sid); //假设sid是一个字符串，根据需要进行调整
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$dbrow=mysqli_fetch_array($res);
$sid=$dbrow['sid']; 
$sname=$dbrow['sname']; 
$city=$dbrow['city'];  
$telephone_no=$dbrow['telephone_no'];
?>

<div>
<table width="70%" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="font-size:28px;">请填写要修改的Suppliers信息</td>
    </tr>
</table>
<form action="save_edit_suppliers.php" method="post"> <!---把内容传到save_edit_suppliers.php 保存-->
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="10">
    <tr>
        <td width="40%" align="right">sid</td>
        <td width="60%" align="left"><input type="text" name="sid" size="40" style="height:25px" 
            value="<?php echo $sid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">sname</td>
        <td width="60%" align="left"><input type="text" name="sname" size="40" style="height:25px" 
            value="<?php echo $sname;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">city</td>
        <td width="60%" align="left"><input type="text" name="city" size="40" style="height:25px" 
            value="<?php echo $city;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">telephone_no</td>
        <td width="60%" align="left"><input type="text" name="telephone_no" size="40" style="height:25px" 
            value="<?php echo $telephone_no;?>"/></td>
    </tr>
</table>

<table width="70%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
        <!----这里很重要,以隐藏方式把ID值也传到save_edit_suppliers.php文,以确定更新的具体是哪条Suppliers信息--->
	    <input type="hidden" name="sid" value="<?php echo $sid; ?>" /> 
	    <input type="submit" name="submit1" value="确定修改"/></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
