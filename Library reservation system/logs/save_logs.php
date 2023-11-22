<?php
include ("conn.php");
mysqli_query($conn,"set names UTF-8");
error_reporting(0); 
//PHP变量是以$开头的,如$a,$b 变量,与C,C++一样都是以";"分号结果一句子;注释也与C,C++一样.
$logid=$_POST["logid"];  
$who=$_POST["who"];  
$time=date("Y-m-d h:i:s");  
$table_name=$_POST["table_name"];  
$operation=$_POST["operation"];  
$key_value=$_POST["key_value"];

//下面用一if语句检测系统的香港时区的时间,我们用的PHP一般以香港时间为准的,
if(function_exists('date_default_timezone_set')) { 
   date_default_timezone_set('Hongkong'); //该函数为PHP5.1内置. 
} 
   
$sql = "INSERT INTO logs (logid,who,time,table_name,operation,key_value)
VALUES ('$logid','$who','$time','$table_name','$operation','$key_value')";

$result = @mysqli_query($conn,$sql) or die(mysqli_error()); //如果添加成功,返回真给$result ,否则为false.

if($result)
{
echo "Logs信息添加成功,<a href='add_logs.php'>返回继续</a>";
}
else
{
echo "Logs信息添加失败,<a href='add_logs.php'>请返回</a>";
}
?>
