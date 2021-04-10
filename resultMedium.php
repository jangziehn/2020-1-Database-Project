<?
//중간 예산 선택 시
include './project_dbconn.php';

$name = $_GET['user_id'];

//사용자 아이디를 넘겨 받는다.
$query_select = "SELECT userID from user WHERE userName = '$name' ";
$result_select = mysqli_query($conn,$query_select);
$row_select = mysqli_fetch_array($result_select);
$uid = $row_select['userID'];

//사용자 아이디 이용하여 선택했던 도시 중 중간값을 선택한다.
$query_var = "select round(count(cityID)/2) as mid from tmptbl where userID = $uid";
$result_var = mysqli_query($conn,$query_var);
$row_var = mysqli_fetch_array($result_var);
$med_var = $row_var['mid']-1;

//중간값을 이용하여 해당 도시 선택.
$query_res = "select cityID from tmptbl where userid = $uid
              order by cityID asc limit $med_var,1";
$result_res = mysqli_query($conn,$query_res);
$row_res = mysqli_fetch_array($result_res);
$city_res = $row_res['cityID'];

//cityCode 를 테이블에서 넘겨받아 결과창으로 출력 준비,.
$query2 = "SELECT source.cityCode FROM allcity, source
            where
            allcity.cityID = $city_res
            and
            allcity.cityID = source.cityID";

$result2 = mysqli_query($conn, $query2);
//$num2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_array($result2);

//tmptbl 과 userpick 테이블의 데이터 중복검사 후 userpick 테이블로 삽입.
$query_del = "delete tmptbl from userpick,tmptbl
              where tmptbl.userid = userpick.userid
              and
              tmptbl.cityID = userPick.cityID";

$query_ins = "INSERT INTO userPick select * from tmpTbl";

mysqli_query($conn,$query_del);
mysqli_query($conn,$query_ins);

//tmptbl 은 임시테이블이기 때문에 모두 삭제.
$query_init = "delete from tmpTbl";
mysqli_query($conn,$query_init);

//최종 결과 하나 출력.
echo "<img src = ./resultSRC/".$row2['cityCode'].".png style='max-width:100%;height:auto'><br>";

//userpick 테이블에서 해당 사용자 아이디 이용하여 정보 넘겨받음.
$query_list = "select allCity.cityName, source.cityCode, source.link from userpick, allCity, source
              WHERE userID = $uid
              and
              allCity.cityID = userPick.cityID
              and
              allcity.cityID = source.cityID";

$result_list = mysqli_query($conn,$query_list);
$row_list = mysqli_fetch_array($result_list);

//넘겨받은 정보로 사용자가 이전에 골랐던 리스트 출력 .
echo "<h1>".$name."'s UserPICK</h1><br> <table border='1' bordercolor='skyblue'>";
echo "<tr><td><h1>".$row_list['cityName']."</h1> ".'</td><td><a href=./resultSRC/'.$row_list['cityCode'].'.png><img src=./imgsrc/'.$row_list['cityCode'].'.png width="560" height="315"></a></td>';
echo "<td><iframe width='560' height='315' src=".'https://www.youtube.com/embed/'.$row_list['link']." ></iframe></td></tr>";

while($row_list = mysqli_fetch_array($result_list)){
  echo "<tr><td><h1>".$row_list['cityName']."</h1> ".'</td><td><a href=./resultSRC/'.$row_list['cityCode'].'.png><img src=./imgsrc/'.$row_list['cityCode'].'.png width="560" height="315"></a></td>';
  echo "<td><iframe width='560' height='315' src=".'https://www.youtube.com/embed/'.$row_list['link']." ></iframe></td></tr>";

}
echo "</table>";



?>


<html>
<head>
  <meta charset= 'utf-8'>
  <script>
  function del(){
    location.href = "./delete.php?did=<? echo $uid;?>";
  }
  </script>
</head>
<body>
  <form name="delete" action="main.php" method="get">
    <input type="image" src="assets/delete.png" value="del" Onclick="del()" width=150 style="margin-top:-300px;margin-left:1470px;" onmouseover="this.src='assets/delete2.png'" onmouseout="this.src='assets/delete.png'">
  </form>
  <a href="main.php">
  <img src="assets/Retry.png" width=150 style="margin-top:-150px;margin-left:1470px;" onmouseover="this.src='assets/Retry2.png'" onmouseout="this.src='assets/Retry.png'">
</a>
</body>
</html>
