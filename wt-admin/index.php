<?php include("base.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign In | WebTree - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
	body {
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #eee;
	}
	
	.form-signin {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	  margin-bottom: 10px;
	}
	.form-signin-heading
	{
		color:#999;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
		 -moz-box-sizing: border-box;
			  box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="login.php" method="post">

      <div style="text-align: center">
<img src="<?php echo $base; ?>/images/webtreelogo_small.png" align="baseline" style="margin-bottom:5px" /><br />
</div>
         
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="txtusername" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="txtpassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <select name="txtlanguage" class="form-control" style="margin-bottom:10px;">
			<?php
			$languages = explode(",", $set_sitelanguages);
			$c = sizeof($languages);
			for($i=0; $i<$c; $i++) {
			?>
            <option value="<?php echo trim($languages[$i]); ?>"><?php echo trim($languages[$i]); ?></option>
            <?php } ?>
			
		
        </select>
		<div class="g-recaptcha" data-sitekey="6LfNiQITAAAAAN44_mU-_4JpF8mOjnWArTL72Wqf"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:8px">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
