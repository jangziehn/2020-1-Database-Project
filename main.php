<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
<head>
<title>로그인</title>
<script>
  function checkform() {
    if (!document.login_form.user_id.value) {
      alert('입력되지 않았습니다. ');
      document.login_form.user_id.focus();
      return;
    }
    document.welcome.submit();
  }
</script>
</head>
<body>
  <form action='./access.php' name='welcome' method='get'>
<br>
<br>
<!-- 메인 페이지, 사용자명을 입력함 -->
<img src="assets/main.png" style="margin-left:100px;" onmouseover="this.src='assets/main2.png'" onmouseout="assets/this.src='main.png'">
<CENTER>What's your name?</b></div><br>
<label></label><input type="text" name="user_id" class="box"/><br>

<center><input type="button" value="enter" OnClick="checkform();"/><br />

</form>
