<?
//사용자명 입력
 include './project_dbconn.php';

 $name = $_GET['user_id'];
 $query = "SELECT * FROM user where userName = '$name'";
 $result = mysqli_query($conn, $query);
 $num = mysqli_num_rows($result);

 $_GET['user_id'] = $name;
 //사용자의 정보를 계속 받아내며 선택 페이지로 넘어감
 include './select_rk.php';

//사용자가 존재하지 않을 경우 user 테이블에 사용자 정보 삽입
 if (!$num) {
   $add_query = "INSERT INTO user(userName) VALUES('$name')";
   mysqli_query($conn, $add_query);
   ?>
   <script>
   $(window).load(function() {
     document.welcome.submit();
     location.href='./select_rk.php';
   });

   </script>
    <?
 }
 // 사용자가 존재할 경우 삽입하지 않고 넘어감
 else {
   ?>
   <script>
   $(window).load(function() {
     document.welcome.submit();
     location.href='./select_rk.php';
   });
  </script>
   <?
 }

?>

<body>
  <script>

  </script>
  <!-- 사용자의 정보를 계속 넘겨줌 -->
  <form name="welcome" method="GET" action="./select_rk.php">
    <?
    foreach($_GET as $key=>$value){
      echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
    }
    ?>
  </form>
</body>
