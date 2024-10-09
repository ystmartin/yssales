<?php

require_once("dbtools.inc.php");
$link = create_connection();
$sql = "SELECT * FROM keyword ";
$result = execute_sql($link, "tw1_yssales", $sql);




while ($row = mysqli_fetch_assoc($result)) {

  $check01=$row['check01'];
  $check02=$row['check02'];
  $check03=$row['check03'];
  $check04=$row['check04'];
  $check05=$row['check05'];



}

/*
  static $check01=$ck01;
  static $check02=$ck02;
  static $check03=$ck03;
  static $check04=$ck04;
  static $check05=$ck05;

	
 static $check01='$ck01';
  static $check02='$ck02';
  static $check03='$ck03';
  static $check04='$ck04';
  static $check05='$ck05';

  */
?>