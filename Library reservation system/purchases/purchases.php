<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>purchases主页面</title>
<style>
    div{
        font-size:36px;
        text-align:center;
        padding:15px;
    }
    table{
        font-size:22px;
        text-align:center;
        padding:5px;
    }
</style>
</head>

<body>
<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
?>
<div>下面为所有Purchases的数据</div>
<table width="80%" height="100" border="5" align="center" cellpadding="10" cellspacing="10">
    <tr>
        <td><b>purid</b></td>
        <td><b>cid</b></td>
        <td><b>eid</b></td>
        <td><b>pid</b></td>
        <td><b>qty</b></td>
        <td><b>ptime</b></td>
        <td><b>total_price</b></td>
        <td colspan=2 width="100px"><b>Operations</b></td>
    </tr>
<div><a href='http://localhost/exp3_reflection/purchases/add_purchases.php?purid=$purid'><font color='red'>Add Purchases</font></div>

<?php
$query = "select * from purchases";  
$res = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);  
if($row)
{
    for($i=0;$i<$row;$i++)  { 
        $dbrow=mysqli_fetch_array($res);
        @$purid=$dbrow['purid']; 
        @$cid=$dbrow['cid']; 
        @$eid=$dbrow['eid']; 
        @$pid=$dbrow['pid']; 
        @$qty=$dbrow['qty']; 
        @$ptime=$dbrow['ptime'];
        @$total_price=$dbrow['total_price'];
?>

<tr>
<?php
echo "<td>$purid</td>"; 
echo "<td>$cid</td>"; 
echo "<td>$eid</td>"; 
echo "<td>$pid</td>"; 
echo "<td>$qty</td>"; 
echo "<td>$ptime</td>"; 
echo "<td>$total_price</td>"; 
echo "<td><a href='http://localhost/exp3_reflection/purchases/edit_purchases.php?purid=$purid'><font color='green'>Edit</font></td>";
echo "<td><a href='http://localhost/exp3_reflection/purchases/del_purchases.php?purid=$purid'><font color='red'>Delete</font></td>";
?>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
