<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>suppliers主页面</title>
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
<div>下面为所有Suppliers的数据</div>
<table width="60%" height="100" border="5" align="center" cellpadding="10" cellspacing="10">
    <tr>
        <td><b>sid</b></td>
        <td><b>sname</b></td>
        <td><b>city</b></td>
        <td><b>telephone_no</b></td>
        <td colspan=2 width="100px"><b>Operations</b></td>
    </tr>
<div><a href='http://localhost/exp3_reflection/suppliers/add_suppliers.php?sid=$sid'><font color='red'>Add Suppliers</font></div>

<?php
$query = "select * from suppliers";  
$res = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);  
if($row)
{
    for($i=0;$i<$row;$i++)  { 
        $dbrow=mysqli_fetch_array($res);
        @$sid=$dbrow['sid']; 
        @$sname=$dbrow['sname']; 
        @$city=$dbrow['city']; 
        @$telephone_no=$dbrow['telephone_no']; 
?>

<tr>
<?php
echo "<td>$sid</td>"; 
echo "<td>$sname</td>"; 
echo "<td>$city</td>"; 
echo "<td>$telephone_no</td>"; 
echo "<td><a href='http://localhost/exp3_reflection/suppliers/edit_suppliers.php?sid=$sid'><font color='green'>Edit</font></td>";
echo "<td><a href='http://localhost/exp3_reflection/suppliers/del_suppliers.php?sid=$sid'><font color='red'>Delete</font></td>";
?>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
