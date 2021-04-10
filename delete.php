<?
//사용자 정보 삭제
  include './project_dbconn.php';

  $id = $_GET['did'];
  //사용자의 아이디를 받아 삭제함

  $query = "DELETE from user where userID = '$id'";
  mysqli_query($conn, $query);

//삭제후 메인페이지로 돌아감 
  echo "<script>alert('Deleted!! GoodBye'); location.href='main.php';</script>"
  ?>
