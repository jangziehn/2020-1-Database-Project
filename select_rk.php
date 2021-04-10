<!DOCTYPE HTML>
<html>
<head>
  <meta charset='utf-8'>


<?
  include './project_dbconn.php';

  $name = $_GET['user_id'];

  //fetch random
    $ran1 = mt_rand(1,5);
    $ran2 = mt_rand(6,10);
    $ran3 = mt_rand(11,15);
    $ran4 = mt_rand(16,20);
    $ran5 = mt_rand(21,25);
    $ran6 = mt_rand(26,30);
  //selecting cityNamne
  $query = "select * from allCity where cityID = $ran1 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city1 = $row[1];

  $query = "select * from allCity where cityID = $ran2 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city2 = $row[1];

  $query = "select * from allCity where cityID = $ran3 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city3 = $row[1];

  $query = "select * from allCity where cityID = $ran4 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city4 = $row[1];

  $query = "select * from allCity where cityID = $ran5 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city5 = $row[1];

  $query = "select * from allCity where cityID = $ran6 ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $city6 = $row[1];


//city array
$cities = array($city1,$city2,$city3,$city4,$city5,$city6);
?>

  <script>
    let img = document.getElementById('image');

    let img_cnt = 0;

    let wish_ = [0, 0, 0, 0, 0, 0];

    var cityarr = <? echo json_encode($cities); ?>;


function onmouse(){
  document.getElementById('done').src='assets/Done2.png';
}

//이미지를 바꾸는 함수
function initial_img(num) {
    if (img_cnt + num < 1) img_cnt = 7;
    if (img_cnt + num > 6) img_cnt = 0;

    img_cnt += num;
    document.getElementById('image').src = './project_image/'+cityarr[img_cnt-1]+'_main(1).png';
    document.getElementById('circle').src = 'assets/index'+img_cnt +'.png';

    if (wish_[img_cnt - 1] == 0) {
        document.getElementById('heart').src = 'assets/heart_.png';
    } else if (wish_[img_cnt - 1] == 1) {
        document.getElementById('heart').src = 'assets/heart.png';
    }

}
//제출 함수
$(window).load(function() {
  document.welcome.submit();
});
function testing(){
  document.getElementById('lbtn').remove();
}
  </script>

<style>
    .container {
        width: 100%;
        height: 720px;
    }

    #image {
        position: absolute;
        top: 570;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 800px;
        height: 600px;
    }

    #image:hover {
        width: 960px;
        height: 720px;
    }

    #done {
        position: absolute;
        margin: auto;
    }

    #rbtn {
         width:200px;
      height:200px;
      float:right;
      margin:150px;
    }

    #lbtn{
        width:200px;
      height:200px;
      float:left;
      margin:150px;
    }

    #heart {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 50px;
        height: 50px;
    }
</style>

    </head>

<body>

  <div class='container' style="position: relative;">

        <img src = 'assets/index0.PNG' id = 'circle' width=700>

        <img src = 'assets/goLeft.png' id='lbtn' onClick=initial_img(-1) style="margin-top:350px;">

        <img src = 'assets/goRight.png' id='rbtn'  onClick=initial_img(1) >

        <center>
            <img src= 'assets/choose.png' id='image'>
        </center>

    </div>


<div style="margin-left:750px;">
 <form action = "./budget.php" method = "get">

   <br>choose what you like<br>
     <input type = 'checkbox' name = 'city1' value = '<? echo $cities[0];?>'  />
     <input type = 'checkbox' name = 'city2' value = '<? echo $cities[1];?>'  />
     <input type = 'checkbox' name = 'city3' value = '<? echo $cities[2];?>'  />
     <input type = 'checkbox' name = 'city4' value = '<? echo $cities[3];?>'  />
     <input type = 'checkbox' name = 'city5' value = '<? echo $cities[4];?>'  />
     <input type = 'checkbox' name = 'city6' value = '<? echo $cities[5];?>'  />
   </div>
   <div style="margin-left:730px;">
     <p><input type = "image" src="assets/done.png" onClick=testing() width=200 id="done" onmouseover="this.src='assets/Done2.png'" onmouseout="this.src='assets/Done.png'"></p>
   <?
   foreach($_GET as $key=>$value){
     echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
   }
   ?>
</form>
</div>

</body>
</html>
