<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
//先接收传过来的数据.
if (!empty($_POST['logid'])){
    $logid=$_POST['logid'];
}
if (!empty($_POST['who'])){
    $who=$_POST['who'];
}
if (!empty(date("Y-m-d h:i:s"))){
    $time=date("Y-m-d h:i:s");
}
if (!empty($_POST['table_name'])){
    $table_name=$_POST['table_name'];
}
if (!empty($_POST['operation'])){
    $operation=$_POST['operation'];
}
if (!empty($_POST['key_value'])){
    $key_value=$_POST['key_value'];
}
@$query = "Update logs set logid='$logid',who='$who',time='$time',table_name='$table_name',operation='$operation', 
    key_value='$key_value' where logid='$logid' "; 
echo $query;
$res = mysqli_query($conn,$query) or die(mysqli_error($conn));

//echo "修改成功";
if($res)
{
?>
<?php
echo "<script language=javascript>window.alert('Logs信息修改成功,请返回');history.back(1);</script>";
}
else
{
?>
echo "<script language=javascript>window.alert('Logs信息修改失败,请返回');history.back(1);</script>";
<?php
}
?>
