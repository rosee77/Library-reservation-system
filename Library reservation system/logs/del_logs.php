<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
if (!empty($_GET['logid'])){
    $logid = $_GET['logid'];
}
$sql = "delete from logs where logid='$logid'";
$result = @mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result)
{
?>
echo "<script language=javascript>window.alert('Logs信息删除成功,请返回');history.back(1);</script>";
<?php
} //result==true
else
{
echo "<script language=javascript>window.alert('Logs信息删除失败,请返回');history.back(1);</script>";
}
?>
