<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>logs主页面</title>
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
<div>下面为所有Logs的数据</div>
<table width="90%" height="100" border="5" align="center" cellpadding="10" cellspacing="10">
    <tr>
        <td><b>logid</b></td>
        <td><b>who</b></td>
        <td><b>time</b></td>
        <td><b>table_name</b></td>
        <td><b>operation</b></td>
        <td><b>key_value</b></td>
        <td colspan=2 width="100px"><b>Operations</b></td>
    </tr>
<div><a href='http://localhost/exp3_reflection/logs/add_logs.php?logid=$logid'><font color='red'>Add Logs</font></div>

<?php
$query = "select * from logs";  
$res = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);  
if($row)
{
    for($i=0;$i<$row;$i++)  { 
        $dbrow=mysqli_fetch_array($res);
        @$logid=$dbrow['logid']; 
        @$who=$dbrow['who']; 
        @$time=$dbrow['time']; 
        @$table_name=$dbrow['table_name']; 
        @$operation=$dbrow['operation']; 
        @$key_value=$dbrow['key_value'];
?>

<tr>
<?php
echo "<td>$logid</td>"; 
echo "<td>$who</td>"; 
echo "<td>$time</td>"; 
echo "<td>$table_name</td>"; 
echo "<td>$operation</td>"; 
echo "<td>$key_value</td>";
echo "<td><a href='http://localhost/exp3_reflection/logs/edit_logs.php?logid=$logid'><font color='green'>Edit</font></td>";
echo "<td><a href='http://localhost/exp3_reflection/logs/del_logs.php?logid=$logid'><font color='red'>Delete</font></td>";
?>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
