<?php
  //造一个mysqli对象，造连接对象
  header("Access-Control-Allow-Origin: *");
  $db=new MySQLi("localhost","root","","carriage");
  //括号里面填的是IP地址域名，用户名，密码，数据库的名字
  //准备一条SQL语句
  $number=0;
  $number=$_REQUEST['number'];
  $result = mysqli_query($db,"select * from owner where Number = '$number'");
  if (!$result) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
  }
  $array= array();
  class Message{
    public $Password;
	  public $Name;
    public $Cargo;
    public $Address;
	public $Account;
  }
  while($row = mysqli_fetch_array($result)){
    $m=new Message();
    $m->Password = $row['Password'];
    $m->Name = $row['Name'];
	  $m->Cargo = $row['Cargo'];
	  $m->Address = $row['Address'];
    $m->Account = $row['Account'];
    $array[]=$m;
  }
  $data=json_encode($array);
  echo $data;
?>