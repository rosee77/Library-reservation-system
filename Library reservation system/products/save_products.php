<?php
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
error_reporting(0); 
//PHP变量是以$开头的,如$a,$b 变量,与C,C++一样都是以";"分号结果一句子;注释也与C,C++一样.
$pid=$_POST["pid"];  
$pname=$_POST["pname"];  
$qoh=$_POST["qoh"];  
$qoh_threshold=$_POST["qoh_threshold"];  
$original_price=$_POST["original_price"];  
$discnt_rate=$_POST["discnt_rate"];  
$sid=$_POST["sid"];  

//下面用一if语句检测系统的香港时区的时间,我们用的PHP一般以香港时间为准的,
if(function_exists('date_default_timezone_set')) { 
   date_default_timezone_set('Hongkong'); //该函数为PHP5.1内置. 
} 
   
$sql = "INSERT INTO products (pid,pname,qoh,qoh_threshold,original_price,discnt_rate,sid)
VALUES ('$pid','$pname','$qoh','$qoh_threshold','$original_price','$discnt_rate','$sid')";

$result = @mysqli_query($conn,$sql) or die(mysqli_error()); //如果添加成功,返回真给$result ,否则为false.

if($result)
{
   $who='wyz'; //根据实际情况获取执行操作的用户
   $time=date("Y-m-d h:i:s");
   $table_name='products';
   $operation='add';
   $key_value=$pid; //刚添加的记录的关键值

   $log_sql = "INSERT INTO logs (who,time,table_name,operation,key_value) 
      VALUES ('$who','$time','$table_name','$operation','$key_value')";
   mysqli_query($conn, $log_sql);

   echo "Products信息添加成功,<a href='add_products.php'>返回继续</a>";
}
else
{
   echo "Products信息添加失败,<a href='add_products.php'>请返回</a>";
}
?>
