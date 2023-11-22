<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改products页面</title>
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
        height:550px;
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
$pid=$_GET["pid"]; //先接收从products.php传过来的ID值以确定要修改的Products信息
$query = "select * from products where pid=?"; 
// $res = @mysqli_query($conn,$query) or die(mysqli_error($conn));
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $pid); //假设pid是一个字符串，根据需要进行调整
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$dbrow=mysqli_fetch_array($res);
$pid=$dbrow['pid']; 
$pname=$dbrow['pname']; 
$qoh=$dbrow['qoh'];  
$qoh_threshold=$dbrow['qoh_threshold'];
$original_price=$dbrow['original_price'];
$discnt_rate=$dbrow['discnt_rate'];
$sid=$dbrow['sid'];
?>

<div>
<table width="70%" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="font-size:28px;">请填写要修改的Products信息</td>
    </tr>
</table>
<form action="save_edit_products.php" method="post"> <!---把内容传到save_edit_products.php 保存-->
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="10">
    <tr>
        <td width="40%" align="right">pid</td>
        <td width="60%" align="left"><input type="text" name="pid" size="40" style="height:25px" 
            value="<?php echo $pid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">pname</td>
        <td width="60%" align="left"><input type="text" name="pname" size="40" style="height:25px" 
            value="<?php echo $pname;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">qoh</td>
        <td width="60%" align="left"><input type="text" name="qoh" size="40" style="height:25px" 
            value="<?php echo $qoh;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">qoh_threshold</td>
        <td width="60%" align="left"><input type="text" name="qoh_threshold" size="40" style="height:25px" 
            value="<?php echo $qoh_threshold;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">original_price</td>
        <td width="60%" align="left"><input type="text" name="original_price" size="40" style="height:25px" 
            value="<?php echo $original_price;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">discnt_rate</td>
        <td width="60%" align="left"><input type="text" name="discnt_rate" size="40" style="height:25px" 
            value="<?php echo $discnt_rate;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">sid</td>
        <td width="60%" align="left"><input type="text" name="sid" size="40" style="height:25px" 
            value="<?php echo $sid;?>"/></td>
    </tr>
</table>

<table width="70%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
        <!----这里很重要,以隐藏方式把ID值也传到save_edit_products.php文,以确定更新的具体是哪条Products信息--->
	    <input type="hidden" name="pid" value="<?php echo $pid; ?>" /> 
	    <input type="submit" name="submit1" value="确定修改"/></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
