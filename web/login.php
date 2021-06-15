<?php

require 'assets/sys/config.php';
require 'assets/sys/init.php';

if ($user -> LoggedIn())
{
header('Location: hub.php');
}

?>
<!DOCTYPE html>
<html lang="pt" class="default-style">

<head>
  <title>CulturaWeb - Acesso Restrito</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icones -->
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css">
  <link rel="stylesheet" href="assets/vendor/fonts/ionicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/linearicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/open-iconic.css">
  <link rel="stylesheet" href="assets/vendor/fonts/pe-icon-7-stroke.css">

  <!-- Princ. Stylesheet -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/uikit.css">
  <link rel="stylesheet" href="assets/css/demo.css">

  <!-- Scripts -->
  <script src="assets/vendor/js/polyfills.js"></script>
  <script>document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')</script>
  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>
  <script src="assets/vendor/js/pace.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/vendor/css/pages/authentication.css">

  <script>
		function login()
		{
    var cpfp=$('#cpf').val();
    var cpf = cpfp.replace(".", "").replace(".", "").replace("-", "");
		var password=$('#loginpassword').val();
		document.getElementById("loginbox");
		document.getElementById("loginimage").style.display="inline";
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("logindiv").innerHTML=xmlhttp.responseText;
			document.getElementById("loginimage").style.display="none";
			document.getElementById("logindiv").style.display="inline";
			if (xmlhttp.responseText.search("Redirecionando") != -1)
			{
      setInterval(function(){window.location="hub.php"},3000);
			}
			}
		  }
		xmlhttp.open("POST","assets/sys/login.php?type=login",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cpf=" + cpf + "&password=" + password);
		}

		</script>
</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>
  <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-color: #141414;">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>
    <div class="authentication-inner py-5">
    <div id="logindiv"></div>
      <div class="card">
        <div class="p-4 p-sm-5">
          <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
            <div class="ui-w-60">
              <div class="w-100 position-relative">
                <img src="images/fox.png" width="50" height="50">
              </div>
            </div>
          </div>
          <h5 class="text-center text-muted font-weight-normal mb-4">CulturaWeb - Acesso Restrito <img id="loginimage" src="assets/gifs/loading.gif" width="10" height="10" style="display:none"/></h5>
          <form autocomplete="off">
            <div class="form-group">
              <label class="form-label">Usuário</label>
              <input type="text" id="cpf" name="cpf" onkeyup="inputcpf()" autocomplete="off" maxlength="14" class="form-control" placeholder="demo: alunoucb" >
              
            </div>
            <div class="form-group">
              <label class="form-label d-flex justify-content-between align-items-end">
                <div>Senha</div>
              </label>
              <input type="password" id="loginpassword" name="loginpassword" class="form-control" placeholder="demo: alunoucb">
            </div>
            <div class="d-flex justify-content-between align-items-center m-0">
              <label class="custom-control custom-checkbox m-0">
              </label>
              <button type="button" id="doLogin" name="doLogin" onclick="login();" class="btn btn-primary">Acessar</button>
            </div>
            
          </form>
          
        </div>
        <div class="card-footer py-3 px-4 px-sm-5">
          <div class="text-center text-muted">
            Perdeu sua senha? <a href="javascript:void(0)">Lembrar Senha</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">

        var input = document.getElementById("loginpassword");
        input.addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("doLogin").click();
            }
        });
	</script>
  <!-- Princ. scripts -->
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/js/sidenav.js"></script>

  <!-- Scripts -->
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>

</body>

</html>