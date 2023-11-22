<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
//先接收传过来的数据.
if (!empty($_POST['purid'])){
    $purid=$_POST['purid'];
}
if (!empty($_POST['cid'])){
    $cid=$_POST['cid'];
}
if (!empty($_POST['eid'])){
    $eid=$_POST['eid'];
}
if (!empty($_POST['pid'])){
    $pid=$_POST['pid'];
}
if (!empty($_POST['qty'])){
    $qty=$_POST['qty'];
}
if (!empty(date("Y-m-d h:i:s"))){
    $ptime=date("Y-m-d h:i:s");
}
if (!empty($_POST['total_price'])){
    $total_price=$_POST['total_price'];
}
@$query = "Update purchases set purid='$purid',cid='$cid',eid='$eid',pid='$pid',qty='$qty',
    ptime='$ptime',total_price='$total_price' where purid='$purid' "; 
echo $query;
$res = mysqli_query($conn,$query) or die(mysqli_error($conn));

//echo "修改成功";
if($res)
{
?>
<?php
    $who='wyz'; //根据实际情况获取执行操作的用户
    $time=date("Y-m-d h:i:s");
    $table_name='purchases';
    $operation='edit';
    $key_value=$purid; //刚添加的记录的关键值
 
    $log_sql = "INSERT INTO logs (who,time,table_name,operation,key_value) 
       VALUES ('$who','$time','$table_name','$operation','$key_value')";
    mysqli_query($conn, $log_sql);

    echo "<script language=javascript>window.alert('Purchases信息修改成功,请返回');history.back(1);</script>";
}
else
{
?>
    echo "<script language=javascript>window.alert('Purchases信息修改失败,请返回');history.back(1);</script>";
<?php
}
?>
