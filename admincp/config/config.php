<?php
$mysqli = new mysqli("localhost","root","","web_ao_quan");

if ($mysqli -> connect_errno) {
  echo "Lỗi kết nối: " . $mysqli -> connect_error;
  exit();
}
?>