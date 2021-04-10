<?
//데이터베이스 연동. root 사용자와 비밀번호는 0000, 데이터베이스명은 project.
  $host_name = "localhost";
  $db_user_id = "root";
  $db_pwd = "0000";
  $db_name = "project";
  $conn = mysqli_connect($host_name, $db_user_id, $db_pwd, $db_name);

  /* check connection */
  if ($conn->connect_error) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
  }
?>
