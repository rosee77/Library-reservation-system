<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
//先接收传过来的数据.
if (!empty($_POST['pid'])){
    $pid=$_POST['pid'];
}
if (!empty($_POST['pname'])){
    $pname=$_POST['pname'];
}
if (!empty($_POST['qoh'])){
    $qoh=$_POST['qoh'];
}
if (!empty($_POST['qoh_threshold'])){
    $qoh_threshold=$_POST['qoh_threshold'];
}
if (!empty($_POST['original_price'])){
    $original_price=$_POST['original_price'];
}
if (!empty($_POST['discnt_rate'])){
    $discnt_rate=$_POST['discnt_rate'];
}
if (!empty($_POST['sid'])){
    $sid=$_POST['sid'];
}
@$query = "Update products set pid='$pid',pname='$pname',qoh='$qoh',qoh_threshold='$qoh_threshold',original_price='$original_price', 
    discnt_rate='$discnt_rate',sid='$sid' where pid='$pid' "; 
echo $query;
$res = mysqli_query($conn,$query) or die(mysqli_error($conn));

//echo "修改成功";
if($res)
{
?>
<?php
    $who='wyz'; //根据实际情况获取执行操作的用户
    $time=date("Y-m-d h:i:s");
    $table_name='products';
    $operation='edit';
    $key_value=$pid; //刚添加的记录的关键值
 
    $log_sql = "INSERT INTO logs (who,time,table_name,operation,key_value) 
       VALUES ('$who','$time','$table_name','$operation','$key_value')";
    mysqli_query($conn, $log_sql);

    echo "<script language=javascript>window.alert('Products信息修改成功,请返回');history.back(1);</script>";
}
else
{
?>
    echo "<script language=javascript>window.alert('Products信息修改失败,请返回');history.back(1);</script>";
<?php
}
?>
