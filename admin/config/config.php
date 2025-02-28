<?php
$mysqli = new mysqli("127.0.0.1","root","","web_phim");
$mysqli->set_charset("utf8");


if ($mysqli -> connect_errno) {
  echo "Kết nối MYSQLi lỗi: " . $mysqli -> connect_error;
  exit();
}
$result = $mysqli->query("SHOW DATABASES");






?>