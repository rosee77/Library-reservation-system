<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>employees主页面</title>
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
<div>下面为所有Employees的数据</div>
<table width="50%" height="100" border="5" align="center" cellpadding="10" cellspacing="10">
    <tr>
        <td><b>eid</b></td>
        <td><b>ename</b></td>
        <td><b>city</b></td>
        <td colspan=2 width="100px"><b>Operations</b></td>
    </tr>
<div><a href='http://localhost/exp3_reflection/employees/add_employees.php?eid=$eid'><font color='red'>Add Employees</font></div>

<?php
$query = "select * from employees";  
$res = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);  
if($row)
{
    for($i=0;$i<$row;$i++)  { 
        $dbrow=mysqli_fetch_array($res);
        @$eid=$dbrow['eid']; 
        @$ename=$dbrow['ename']; 
        @$city=$dbrow['city'];  
?>

<tr>
<?php
echo "<td>$eid</td>"; 
echo "<td>$ename</td>"; 
echo "<td>$city</td>"; 
echo "<td><a href='http://localhost/exp3_reflection/employees/edit_employees.php?eid=$eid'><font color='green'>Edit</font></td>";
echo "<td><a href='http://localhost/exp3_reflection/employees/del_employees.php?eid=$eid'><font color='red'>Delete</font></td>";
?>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
