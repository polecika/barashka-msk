
<!-- Отдел "Программы -->
    <div class="shows" id="show">
       <?
        if($_GET["id"]!=='shows') {
        echo '
        <div class="row">
            <div class="col-12 show_headline">
                <h1>Шоу-программы</h1>
            </div>
        </div>';
        }
        ?>
        <div class="row">
            <?
				if($_GET["id"]!=='shows') {
					echo '<div class="col-12">
					<div class="show_cards">';
				}

					$query4 = 'SELECT  * FROM `servises` WHERE `type` =  "программа"';
					$result4 = $link->query($query4); 
					 while($row4 = $result4->fetch_array(MYSQLI_ASSOC))
					 {
						 echo '<div class="';
						 if($_GET["id"]!=='shows') 
						 {
							 echo 'card_single';
						 }
						 else
						 {
							 echo 'col-12 col-md-6 col-lg-4';
						 }
						
						 echo '">
									<a href="/shows/'.$row4["cpu"].'/"><img src="/admin/'.$row4["image"].'" alt="'.$row4["cpu"].'_barashka_msk" class="';
									if($_GET["id"]!=='shows') 
									{
										echo 'show_card_img';
									}
									else
									{
										echo 'show_img';
									}
									echo '"></a>
									<h2>'.$row4["name"].'</h2>
									<p class="price-text">Цена от '.$row4["price"].' р.</p>
									<a href="/shows/'.$row4["cpu"].'/" class="btn btn-2"><h3>Подробнее</h3></a>
								</div>';
					 }
                   
				if($_GET["id"]!=='shows') {
					echo '</div>';
				}
				 
                ?>
                
            
        </div>
        <div class="row ">
            <div class="col-12 show_call">
                <a href="#" class="button-4d" data-toggle="modal" data-target="#call">Заказать</a>
            </div>
        </div>
    </div>