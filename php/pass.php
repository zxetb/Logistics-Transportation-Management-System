<?php
  //造一个mysqli对象，造连接对象
  header("Access-Control-Allow-Origin: *");
  $db=new MySQLi("localhost","root","","carriage");
  //括号里面填的是IP地址域名，用户名，密码，数据库的名字
  //准备一条SQL语句
  $Orderkey=0;
  $Orderkey=$_REQUEST['Orderkey'];
  $sql = "Update orders set Audit = 1 where Orderkey = $Orderkey";
  $result = mysqli_query($db,$sql);
  if (!$result) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
  }
  echo 1;
?>