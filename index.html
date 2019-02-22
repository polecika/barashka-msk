<?
include 'includes/config.php'; //Подключение к базе данных
 if(isset($_GET["id"]))
 {
	$cpu1 =$_GET["id"];
	$querycpu1 = "SELECT  `name`  FROM  `pages` WHERE `cpu` = '$cpu1'";
	$resultcpu1 = $link->query($querycpu1);
	$cpu1name = $resultcpu1->fetch_array(MYSQLI_ASSOC);
	if(isset($_GET["p"]))
	{
		$cpu2 =$_GET["p"];
		if($_GET["id"]=="shows")
		{
			$query = "SELECT  *  FROM  `servises` WHERE `cpu` = '$cpu2'";
			$rslt = $link->query($query);
			$p = $rslt->fetch_array(MYSQLI_ASSOC);
		}
		elseif($_GET["id"]=="articles")
		{
			$query = "SELECT  *  FROM  `news` WHERE `cpu` = '$cpu2'";
			$rslt = $link->query($query);
			$p = $rslt->fetch_array(MYSQLI_ASSOC);
		}
		elseif($_GET["id"]=="characters")
		{
			$query = "SELECT  *  FROM  `servises` WHERE `cpu` = '$cpu2'";
			$rslt = $link->query($query);
			$p = $rslt->fetch_array(MYSQLI_ASSOC);
		}
	}
	else
	{
	//$cpu1 =$_GET["id"];
	$query = "SELECT  *  FROM  `pages` WHERE `cpu` = '$cpu1'";
    $rslt = $link->query($query);
	$p = $rslt->fetch_array(MYSQLI_ASSOC);
	$id=$p["id"];
	}
	
 }
 else
 {
	$query = "SELECT  *  FROM  `pages` WHERE `cpu` = ''";
    $rslt = $link->query($query);
	$p = $rslt->fetch_array(MYSQLI_ASSOC);
	$id=$p["id"];
 }

 
 if(isset($_POST["klient"]) && isset($_POST["telephone"]))
{
    $klient=$_POST["klient"];
    $telephone=$_POST["telephone"];
    $call_date=date("Y-m-d H:i:s");
    $sql="INSERT INTO `orders`( `name`, `telephone`, `call_date`) VALUES ('$klient','$telephone', '$call_date')";
    mysqli_query($link, $sql);
	//Отправим сообщение о новом отзыве на телефон
	mail("1A5E0077-DC28-6932-039C-9B22D3689EFF+79774718025@sms.ru","from:BarashkaMsk","New order");
	mail("8D6BB3E3-0BC7-5679-C488-CC2F58CDE2F0+79774718015@sms.ru","from:BarashkaMsk","New order");

};

//Определяем, с телефона вошел пользователь, или с компьютера    
function check_smartphone() {
 
    $phone_array = array('iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
    $agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
 
    foreach ($phone_array as $value) {
 
        if ( strpos($agent, $value) !== false ) return true;
 
    }
 
    return false;
 
}

//Достаем из БД страницы
$query = 'SELECT * FROM `pages`';
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<!-- Global site tag (gtag.js) - Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120202595-1"></script> 
<script> 
    window.dataLayer = window.dataLayer || []; 
    function gtag(){dataLayer.push(arguments);} 
    gtag('js', new Date()); 

    gtag('config', 'UA-120202595-1'); 
</script>

	<title><? echo $p["title"]; ?></title>
    <!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <!-- Настройка viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Настройка description -->
    <meta name="description" content="<? echo $p["description"]; ?>">
    <!-- Настройка keywords -->
    <meta name="Keywords" content="<? echo $p["keywords"]; ?>"> 
    <meta name="yandex-verification" content="e50b9691f96b9fc7" />
    

    <!-- Подключаем шрифты -->
    <link href="https://fonts.googleapis.com/css?family=Neucha|Yanone+Kaffeesatz" rel="stylesheet">
    <!-- Подключаем Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <!-- Подключаем Слик для слайдера -->
   <link rel="stylesheet" type="text/css" href="/css/slick/slick.css"/>
   <link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/fonts/fontawesome-free-5.0.9/css/font-awesome.min.css">
    <script defer src="/fonts/fontawesome-free-5.0.9/svg-with-js/js/fontawesome-all.js"></script>
    
      <!-- Подключаем final CSS -->
      <link rel="stylesheet" href="/css/final.css">
      
       <!-- Подключаем favicon -->
       <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <!-- Yandex.Metrika counter --> 
    
    <script type="text/javascript" > 
        (function (d, w, c) { 
            (w[c] = w[c] || []).push(function() { 
            try { 
            w.yaCounter49098142 = new Ya.Metrika2({ 
            id:49098142, 
            clickmap:true, 
            trackLinks:true, 
            accurateTrackBounce:true, 
            webvisor:true 
            }); 
            } catch(e) { } 
            }); 

            var n = d.getElementsByTagName("script")[0], 
            s = d.createElement("script"), 
            f = function () { n.parentNode.insertBefore(s, n); }; 
            s.type = "text/javascript"; 
            s.async = true; 
            s.src = "https://mc.yandex.ru/metrika/tag.js"; 

            if (w.opera == "[object Opera]") { 
            d.addEventListener("DOMContentLoaded", f, false); 
            } else { f(); } 
        })(document, window, "yandex_metrika_callbacks2"); 
    </script> 
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/49098142" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript> 
    
    <!-- /Yandex.Metrika counter -->
</head>
<body>
   <div class="main" id="main">
    <div class="row menu">
        <div class="col-2">
            <a href="/" class="barashka-logo">
                <img src="/img/лого цвет.png" alt="barashka-msk">
                <h3>Барашка</h3>
            </a>
        </div>
        <div class="col-5">
            <div class="wrap">
			<form action="/search/" method="POST">
			   <div class="search">
				  <input type="text" name="search-input" class="searchTerm" placeholder="">
				  <button type="submit"  class="searchButton">
					<i class="fa fa-search"></i>
				 </button>
			   </div>
			</form>
			</div>
        </div>
        <div class="col-5 align-self-center connect">
            <span>+7 (977) 471 80 15</span>
			<a href="#" data-toggle="modal" data-target="#call" class="button-header">Заказать звонок</a>
        </div>
    </div>
    <div class="row menu_true">
        <?
        $result = $link->query($query);
        while($page = $result->fetch_assoc()) {
            if($page["tree"] ==0) {
				if($page["id"] ==26) {
					echo '<div class="col-sm-2 col-12 kek"><a href="/" class="btn btn-2">'.$page["name"].'</a></div>';
				}
				else {
					echo '<div class="col-sm-2 col-12 kek"><a href="/'.$page["cpu"].'/" class="btn btn-2">'.$page["name"].'</a></div>';
				}
            }
           }
        $result->free();

        ?>
    </div>
    <?
        if($_GET["id"]=="") {
            include 'includes/video.php';
        }
    ?>
       
   </div>


    <?
        //если страница главная
		if($_GET["id"]=="") {
		    include 'includes/why.php';
			include 'includes/show.php';
			echo '<hr>';
			include 'includes/pers.php';
			include 'includes/call-box.php';
			include 'includes/calc.php';
			include 'includes/review.php';
		
		}
		elseif($_GET["id"]=="search")
		{
			//Вывод результата поиска
			echo '<h1>По вашему запросу мы нашли следующие результаты</h1>';
			$s=htmlspecialchars($_POST["search-input"]);
			if(preg_match('/[a-z0-9]+/i', $s)) {
				$s=strtr($s, array('a'=>'ф','b'=>'и', 'c'=>'с', 'd'=>'в', 'e'=>'у', 'f'=>'а', 'd'=>'в', 
				'q'=>'й', 'w'=>'ц', 'r'=>'к', 't'=>'е', 'y'=>'н', 'u'=>'г', 'i'=>'ш', 'o'=>'щ', 'p'=>'з',
				'['=>'х','s'=>'ы','f'=>'а','g'=>'п','h'=>'р','j'=>'о','k'=>'л','l'=>'д',';'=>'ж','z'=>'я',
				'x'=>'ч', 'v'=>'м', 'n'=>'т', 'm'=>'ь', ','=>'б', '.'=>'ю'));
				
			}
            //Поиск по программам и персонажам
			$query_serv = "SELECT * FROM `servises` WHERE `name` LIKE '%$s%'
			OR `full_description` LIKE '%$s%'";
			$result_serv = $link->query($query_serv);
			$result_count = 0;
			while ($row = $result_serv->fetch_array(MYSQLI_ASSOC)) {
				$result_count++;
				echo '
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">'.$row["name"].'</h2>
						<p class="card-text">'.$row["shot_description"].'</p>';
						if($row["type"] == 'персонаж') 
						{
							echo '<a href="/characters/'.$row["cpu"].'/" class="btn button-5d">Подробнее</a>';
						}
						else
						{
							echo '<a href="/shows/'.$row["cpu"].'/" class="btn button-5d">Подробнее</a>';
						}
						
						echo '
					</div>
				</div>
				';
			}
            //Поиск по статьям
			$query_new = "SELECT * FROM `news` WHERE `name` LIKE '%$s%'
			OR `text` LIKE '%$s%'";
			$result_new = $link->query($query_new);
			while ($row = $result_new->fetch_array(MYSQLI_ASSOC)) {
			$result_count++;
			echo '<div class="card">
					<div class="card-body">
						<h2 class="card-title">'.$row["name"].'</h2>
						<p class="card-text">';
						echo substr($row["text"], 0, 1000).'...';
						echo '</p>
						<a href="/articles/'.$row["cpu"].'/" class="btn button-5d">Подробнее</a>
					</div>
				</div>';
			
			}
			if($result_count==0)
			{
				echo '<p align="center">Извините, но по запросу "'.$s.'" ничего не найдено :(</p>
				<p align="center">Попробуйте изменить запрос.</p>';
			}
			
			
			
		}
        elseif($_GET["id"]=="articles" &&  $_GET["p"]=="")
        {
			
			
				echo '<h1>'.$p["name"].'</h1>';
				//Вывод списка статей
				$query_new = "SELECT * FROM `news`";
				$result_new = $link->query($query_new);
				while ($row = $result_new->fetch_array(MYSQLI_ASSOC)) {
					echo '<div class="card">
						<div class="card-body">
							<h2 class="card-title">'.$row["name"].'</h2>
							<p class="card-text">';
							echo substr($row["text"], 0, 1000).'...';
							echo '</p>
							<a href="/articles/'.$row["cpu"].'/" class="btn button-5d">Подробнее</a>
						</div>
					</div>';
				}
			 
            
        }
		else {
			if( isset($p["name"]) || $p["name"]!="") {
				
				echo '<div class="content" >
				    <!-- Хлебные крошки --> 
				    <div class="row xleb">
						<div class="col-md-12">';
                        
						if(isset($cpu2))
						{
							echo '<p><a href="/">Главная</a>&#10047;<a href="/'.$cpu1.'/">'.$cpu1name["name"].'</a>';
							echo '&#10047;<a href="/'.$cpu1.'/'.$cpu2.'/">'.$p["name"].'</a>';
						}
						else
						{
							echo '<p><a href="/">Главная</a>&#10047;<a href="/'.$cpu1.'/">'.$p["name"].'</a>';
						}
						echo '<p>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 ">
                            <h1>'.$p["name"].'</h1>
                        </div>
                    </div>';
                    if(isset($cpu2)) {
						if($cpu1=="shows") {
							//если показывают шоу-программы
							 $age = explode(";", $p["age"]);
							 
							echo '
							<div class="row">
								<div class="col-md-4">
									<img src="/admin/'.$p["image"].'" class="img-card" alt="'.$cpu2.' barashka-msk"> 
									<p class="lead text-center">Цена от '.$p["price"].'р.</p>
								</div>
								<div class="col-md-8">
									<p class="lead">Подходят: '.$p["sex"].'</p>
									<p class="lead">На праздники: '.$p["event"].'</p>
									<p class="lead">Для детей от '.$age[0].' до '.$age[1].' лет</p>
									<p class="lead">Описание: '.$p["shot_description"].'</p>
								</div>
							</div>
							<div class="row">
								<div clas = "col-md-12">
									<p>'.$p["full_description"].'</p>
								</div>
							</div>';
							include 'includes/call-box.php';
						}
						if ($cpu1=="characters")
						{
                            //если показывают список персонажей
							echo '
							<div class="row">
								<div class="col-md-4">
									<img src="/admin/'.$p["image"].' "class="img-card" alt="'.$cpu2.'barashka-msk">
								</div>
								<div class="col-md-8">
									<p class="lead">Подходят: '.$p["sex"].'</p>
									<p class="lead">На праздники: '.$p["event"].'</p>
									<p class="lead">Для детей от '.$age[0].' до '.$age[1].' лет</p>
									<p class="lead">Описание: '.$p["shot_description"].'</p>
								</div>
							</div>
							<div class="row">
								<div clas = "col-md-12">
									<p>'.$p["full_description"].'</p>
								</div>
							</div>';
							include 'includes/call-box.php';
						}
						if($cpu1=="articles") 
						{
							$date_new = $p["data"];
							$date = new DateTime($date_new);
							echo '
							<div class="row content text">
								<div class="col-md-12">
									<small>';
									echo $date->format('m.d.Y');
									echo '</small>
									'.$p["text"] .'
								</div>
							</div>
							';
						}
					}
					else
					{
						echo '
						
						<div class="row content text">
							<div class="col-md-12">'.
							$p["content"].
						'
							</div>
						</div>
						</div>';
						//Добавляем элементы, подключенные к странице
						$query3 = "SELECT * FROM `elements`";
						$result3 = $link->query($query3);
						while ($row3 = $result3->fetch_array(MYSQLI_ASSOC)) {
												 
							$query5 = "SELECT DISTINCT  `id_page` ,  `id_element`  FROM `relations` WHERE `id_page` = $id";
							$result5 = $link->query($query5);
							while($row5 = $result5->fetch_array(MYSQLI_ASSOC)) {
								if( $row5["id_element"]==$row3["id"]) {
									$inc='includes/'.$row3["link"];
									include $inc;
								}
							}
						}
					}
					
			}
			else
			{
				include('error_404.html');

			}		
                
		}
		
	?>
	
	 <!-- Телефон -->
    <div class="phone_pan" id="con">
        <div class="row justify-content-around align-items-center phone_pan">
            <div class="col-md-3 col-4 ">Свяжитесь с нами</div>
            <div class="col-md-3 col-4 ">+ 7 977 471 80 15</div>
            <div class="col-md-3 col-4 ">
            <i class="fa fa-phone phone" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#call">Заказать звонок</a>
            </div>
        </div>
    </div>

    <!-- Футер -->
    <div class="footer">
        <div class="row justify-content-between">
            <div class="col-3 foo_logo">
                <a href="/" class="barashka-logo">
                <img src="/img/логочб.png" alt="Праздничное агентсво БАРАШКА">
                <h1>Барашка</h1>
                </a>
               <h3>© 2018 "Барашка"</h3>  
            </div>
            <div class="col-4 foo_info align-self-center">
                <h3>Режим работы: <br>С 9:00 до 23:00 <br>Без выходных <br><br>Мы в соцсетях:  <br><br>
                    <a href="https://www.instagram.com/barashka_msk/"><i  class="fab fa-instagram"></i></a>
                    <a href="https://vk.com/barashka_msk" ><i class="fab fa-vk"></i></a>
                    <a href="
                    <?
                    if(check_smartphone()){
                        echo 'viber://add?number=+79774718015';
                    }
                    else {
                        echo ' viber://chat?number=79774718015';
                    }
                    ?>
                   
                    " > <i class="fab fa-viber"> </i></a>
                    <a href="https://api.whatsapp.com/send?phone=79774718015" > <i class="fab fa-whatsapp"></i></a>
                     </h3>
            </div>
            <div class="col-4 foo_link align-self-center">
                <br></br>
                <h3><b>Быстрые ссылки:</b> 
                <br>
                <u>
                <?
                $result1 = $link->query($query);
                while($page = $result1->fetch_assoc()) {
                    if($page["tree"] ==0 || $page["tree"] ==1) {
                        echo '<a href="/'.$page["cpu"].'/">'.$page["name"].'</a> <br>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Модальное окно -->  
    <div class="modal fade" id="call" tabindex="-1" role="dialog" aria-labelledby="callLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="callLabel">Отправьте запрос на обратный звонок и мы перезвоним Вам в течении 15ти минут!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="/" method="POST" class="form-control">
              <div class="modal-body">
                  
                    <div class="form-group">
                        <label>Как к вам обращаться?</label>
                        <input type="text" name="klient" placeholder="Имя" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Введите ваш номер телефона:</label>
                        <input type="text" name="telephone" placeholder="+7 9хх-ххх-хх-хх" class="form-control">
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <input type="submit" class="btn btn-primary" value="отправить">
              </div>
          </form>
        </div>
      </div>
    </div>
	 
    <!-- Подключаем jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Подключаем плагин Popper (необходим для работы компонента Dropdown и др.) -->
    <script src="/js/popper.min.js"></script>
    <!-- Подключаем Слик js -->
   <script type="text/javascript" src="/css/slick/slick.min.js"></script>

    <!-- Подключаем Bootstrap JS -->    
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/main.js"> </script>
	
	<script type="text/javascript" src="/js/jquery.maskedinput.min.js"> </script>

</body>
</html>
