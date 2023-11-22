<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>products主页面</title>
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
<div>下面为所有Products的数据</div>
<table width="80%" height="100" border="5" align="center" cellpadding="10" cellspacing="10">
    <tr>
        <td><b>pid</b></td>
        <td><b>pname</b></td>
        <td><b>qoh</b></td>
        <td><b>qoh_threshold</b></td>
        <td><b>original_price</b></td>
        <td><b>discnt_rate</b></td>
        <td><b>sid</b></td>
        <td colspan=2 width="100px"><b>Operations</b></td>
    </tr>
<div><a href='http://localhost/exp3_reflection/products/add_products.php?pid=$pid'><font color='red'>Add Products</font></div>

<?php
$query = "select * from products";  
$res = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);  
if($row)
{
    for($i=0;$i<$row;$i++)  { 
        $dbrow=mysqli_fetch_array($res);
        @$pid=$dbrow['pid']; 
        @$pname=$dbrow['pname']; 
        @$qoh=$dbrow['qoh']; 
        @$qoh_threshold=$dbrow['qoh_threshold']; 
        @$original_price=$dbrow['original_price']; 
        @$discnt_rate=$dbrow['discnt_rate']; 
        @$sid=$dbrow['sid']; 
?>

<tr>
<?php
echo "<td>$pid</td>"; 
echo "<td>$pname</td>"; 
echo "<td>$qoh</td>"; 
echo "<td>$qoh_threshold</td>"; 
echo "<td>$original_price</td>"; 
echo "<td>$discnt_rate</td>"; 
echo "<td>$sid</td>"; 
echo "<td><a href='http://localhost/exp3_reflection/products/edit_products.php?pid=$pid'><font color='green'>Edit</font></td>";
echo "<td><a href='http://localhost/exp3_reflection/products/del_products.php?pid=$pid'><font color='red'>Delete</font></td>";
?>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
