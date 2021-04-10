

   <?
   //예산 측정 페이지
   include './project_dbconn.php';

   $name = $_GET['user_id'];

   $query_select = "SELECT userID from user WHERE userName = '$name' ";
   $result_select = mysqli_query($conn,$query_select);
   $row_select = mysqli_fetch_array($result_select);
   $uid = $row_select['userID'];
// 사용자의 정보를 계속 받아줌

// 6개의 도시들 중 선택했던 도시들의 정보
   $gget1 = $_GET['city1'];
   $gget2 = $_GET['city2'];
   $gget3 = $_GET['city3'];
   $gget4 = $_GET['city4'];
   $gget5 = $_GET['city5'];
   $gget6 = $_GET['city6'];
// 선택된 도시가 없다면 다시 선택
   if(!$gget1 && !$gget2 && !$gget3 && !$gget4 && !$gget5 && !$gget6){
     echo "<script> alert('Nothing Selected!!'); </script>";
     echo "<script> location.href = 'select_rk.php'; </script>";
   }

   if($gget1)
   {
   $query2 = " insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget1'))";
   mysqli_query($conn, $query2);
   }

   if($gget2)
   {
    $query2 = "insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget2'))" ;
   mysqli_query($conn,$query2);
   }

   if($gget3)
   {
   $query2 = "insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget3'))";
   mysqli_query($conn,$query2);
   }

   if($gget4)
   {
   $query2 = "insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget4'))";
   mysqli_query($conn,$query2);
   }

   if($gget5)
   {
   $query2 = "insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget5'))";
   mysqli_query($conn,$query2);
   }

   if($gget6)
   {
   $query2 = "insert into tmpTbl
   values($uid,(select cityID from allCity where cityName = '$gget6'))";
   mysqli_query($conn,$query2);
   }
   // 선택 정보 확인 후 tmptbl 에 삽입


   ?>

<head>
  <style>
  left{
    position:absolute;
    left:500px;
    top:500px;
  }
  </style>
</head>

<body>
  <script>
  $(window).load(function() {
    document.welcome.submit();
  });
  </script>

<div style="margin-left:500px;">
  <img src="assets/choosebudget.png" width=650 style="margin-top:100px;" onmouseover="this.src='assets/choosebudget2.png'" onmouseout="this.src='assets/choosebudget.png'">
</div>

<div style="width:55%;height:400px;margin-left:400px; margin-top:0px;float:left;display:table;vertical-align:middle;">
  <div style="display:table-cell;vertical-align:middle;">
<center>
<form action="resultLow.php" method="GET">
<input type="image" src="assets/budgetLow.png" width=300 name="low" value="submit" style="float:left" onmouseover="this.src='assets/budgetLow2.png'" onmouseout="this.src='assets/budgetLow.png'">
<?
//사용자의 정보를 계속해서 넘겨줌
foreach($_GET as $key=>$value){
  echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
}
?>
</form>
<form action="resultMedium.php" method="GET">
<input type="image" src="assets/budgetMedium.png" width=300 name="medium" value="submit" style="float:left" onmouseover="this.src='assets/budgetMedium2.png'" onmouseout="this.src='assets/budgetMedium.png'">
<?
//사용자의 정보를 계속해서 넘겨줌
foreach($_GET as $key=>$value){
  echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
}
?>
</form>
<form action="resultHigh.php" method="GET">
<input type="image" src="assets/budgetHigh.png" width=300 name="high" value="submit" style="float:left" onmouseover="this.src='assets/budgetHigh2.png'" onmouseout="this.src='assets/budgetHigh.png'">
</center>
<?
//사용자의 정보를 계속해서 넘겨줌
foreach($_GET as $key=>$value){
  echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
}
?>
</form>
</div>
</div>


</body>
