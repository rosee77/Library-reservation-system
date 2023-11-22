<?php 
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
//先接收传过来的数据.
if (!empty($_POST['sid'])){
    $sid=$_POST['sid'];
}
if (!empty($_POST['sname'])){
    $sname=$_POST['sname'];
}
if (!empty($_POST['city'])){
    $city=$_POST['city'];
}
if (!empty($_POST['telephone_no'])){
    $telephone_no=$_POST['telephone_no'];
}
@$query = "Update suppliers set sid='$sid',sname='$sname',city='$city',telephone_no='$telephone_no', where sid='$sid' "; 
echo $query;
$res = mysqli_query($conn,$query) or die(mysqli_error($conn));

//echo "修改成功";
if($res)
{
?>
<?php
    $who='wyz'; //根据实际情况获取执行操作的用户
    $time=date("Y-m-d h:i:s");
    $table_name='suppliers';
    $operation='edit';
    $key_value=$sid; //刚添加的记录的关键值
 
    $log_sql = "INSERT INTO logs (who,time,table_name,operation,key_value) 
       VALUES ('$who','$time','$table_name','$operation','$key_value')";
    mysqli_query($conn, $log_sql);

    echo "<script language=javascript>window.alert('Suppliers信息修改成功,请返回');history.back(1);</script>";
}
else
{
?>
    echo "<script language=javascript>window.alert('Suppliers信息修改失败,请返回');history.back(1);</script>";
<?php
}
?>
