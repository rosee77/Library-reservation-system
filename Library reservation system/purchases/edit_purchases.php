<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改purchases页面</title>
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
$purid=$_GET["purid"]; //先接收从purchases.php传过来的ID值以确定要修改的Purchases信息
$query = "select * from purchases where purid=?"; 
// $res = @mysqli_query($conn,$query) or die(mysqli_error($conn));
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $purid); //假设purid是一个字符串，根据需要进行调整
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$dbrow=mysqli_fetch_array($res);
$purid=$dbrow['purid']; 
$cid=$dbrow['cid']; 
$eid=$dbrow['eid'];  
$pid=$dbrow['pid'];
$qty=$dbrow['qty'];
$total_price=$dbrow['total_price'];
?>

<div>
<table width="70%" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="font-size:28px;">请填写要修改的Purchases信息</td>
    </tr>
</table>
<form action="save_edit_purchases.php" method="post"> <!---把内容传到save_edit_purchases.php 保存-->
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="10">
    <tr>
        <td width="40%" align="right">purid</td>
        <td width="60%" align="left"><input type="text" name="purid" size="40" style="height:25px" 
            value="<?php echo $purid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">cid</td>
        <td width="60%" align="left"><input type="text" name="cid" size="40" style="height:25px" 
            value="<?php echo $cid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">eid</td>
        <td width="60%" align="left"><input type="text" name="eid" size="40" style="height:25px" 
            value="<?php echo $eid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">pid</td>
        <td width="60%" align="left"><input type="text" name="pid" size="40" style="height:25px" 
            value="<?php echo $pid;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">qty</td>
        <td width="60%" align="left"><input type="text" name="qty" size="40" style="height:25px" 
            value="<?php echo $qty;?>"/></td>
    </tr>
    <tr>
        <td width="40%" align="right">total_price</td>
        <td width="60%" align="left"><input type="text" name="total_price" size="40" style="height:25px" 
            value="<?php echo $total_price;?>"/></td>
    </tr>
</table>

<table width="70%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
        <!----这里很重要,以隐藏方式把ID值也传到save_edit_purchases.php文,以确定更新的具体是哪条Purchases信息--->
	    <input type="hidden" name="purid" value="<?php echo $purid ?>" /> 
	    <input type="submit" name="submit1" value="确定修改"/></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
