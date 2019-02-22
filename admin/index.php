<?
session_start();

include 'includes/config.php'; //Подключение к базе данных

// если пользователь нажал кновку "Выйти", удаляем сессию
if(isset($_GET['out']))
{
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['password']);
    header ('Location: http://barashka-msk.ru/admin/');
    
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="../fonts/fontawesome-free-5.0.9/css/font-awesome.min.css">
    <script defer src="../fonts/fontawesome-free-5.0.9/svg-with-js/js/fontawesome-all.js"></script>

    <title>Административная панель "Барашка"</title>

	
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    
    

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="../scripts/ckeditor/ckeditor.js" ></script>
  </head>

  <body>

<?

// проверка правильности пароля
if(isset($_POST["login"]) && isset($_POST["password"]) && empty($_SESSION["login"])) //если логин и пароль только введены в форму
	{
        $query = "SELECT  *  FROM  `users` WHERE `ID` = 1";
        $result = $link->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);
        $login=$row["login"];
        $password=$row["password"];
        $name=$row["name"];
        if(($login==$_POST["login"] && $password==$_POST["password"])) {
            $_SESSION['login'] = $_POST['login'];  
            $_SESSION['password'] = $_POST['password']; 
            $_SESSION['name'] = $name;
            
            
		}
        else {
            $error = '<p>логин и/или пароль введены не верно<p>';
            include 'includes/login.php';
          
        }	
	}
elseif(!isset($_POST["login"]) && !isset($_POST["password"]) && !isset($_SESSION["login"])) //первый вход
{
    include 'includes/login.php';
}
// если залогинился, открываем панель администрирования
if(isset($_SESSION['login']))
{
	 echo '   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <img src="barashek_cb.png" width="50px">
          <a class="navbar-brand" href="index.php">АдминБарашка</a>
		  
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		    <li><p class="hello">Здравствуй, '.$_SESSION['name'].'!</p></li>
			<li class="min-size"><a href="index.php"> Страницы</a></li>
			<li class="min-size"><a href="index.php?page=servises"> Программы/Персонажи</a></li>
			<li class="min-size"><a href="index.php?page=articles"> Статьи</a></li>
			<li class="min-size"><a href="index.php?page=orders"> Заказы</a></li>
			<li class="min-size"><a href="index.php?page=promo-kod"> Промо-коды</a></li>
			<li class="min-size"><a href="index.php?page=reviews"> Отзывы</a></li>
			<hr class="min-size">
             
            <li><a href="index.php?out=1">Выход</a></li>
			
          </ul>
        </div>
      </div>
    </div>
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ';
			if(!isset($_GET['page']) || $_GET['page']=="") {
				echo 'class="active"'; 
			}
			echo ' ><a href="index.php">Страницы</a></li>
            <li ';
			if($_GET['page']=="servises") {
				echo 'class="active"';
			}
			echo ' ><a href="index.php?page=servises">Программы/Персонажи</a></li>
            <li ';
			if($_GET['page']=="orders") {
				echo 'class="active"';
			}
			echo '><a href="index.php?page=orders" >Заказы</a></li>
			<li ';
			if($_GET['page']=="articles") {
				echo 'class="active"';
			}
			echo '><a href="index.php?page=articles" >Статьи</a></li>
			<li ';
			if($_GET['page']=="promo-kod") {
				echo 'class="active"';
			}
			echo '><a href="index.php?page=promo-kod">Промо-коды</a></li>
			<li ';
			if($_GET['page']=="reviews") {
				echo 'class="active"';
			}
			echo '><a href="index.php?page=reviews">Отзывы</a></li>
          </ul>
        </div>
	';
	if(!isset($_GET['page']) || $_GET['page']=="")
	{
		include 'includes/main.php';
	}
    elseif($_GET['page']=="orders")
	{
		include 'includes/orders.php';
	}
	elseif($_GET['page']=="servises")
	{
		include 'includes/servises.php';
	}
	elseif($_GET['page']=="articles")
	{
		include 'includes/articles.php';
	}
	elseif($_GET['page']=="promo-kod")
	{
		include 'includes/promo-kod.php';
	}
	elseif($_GET['page']=="reviews")
	{
		include 'includes/reviews.php'; 
	}
     unset($_POST['login']);
     unset($_POST['password']);
     
   echo ' </div>  </div>';
}
	



?>
<script>
CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
</script>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/admin.js"></script>
  </body>
</html>
