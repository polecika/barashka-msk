    <!-- Отдел "Персонажи -->
    <div class="pers" id="pers">
        <?
        if($_GET["id"]!=='characters') {
        echo '
        <div class="row">
            <div class="col-12 pers_headline">
                <h1>Персонажи</h1>
            </div>
        </div>';
        }
		
        ?>
        <div class="row">
		<?
        if($_GET["id"]!=='characters') {
            $query4 = 'SELECT  * FROM `servises` WHERE `type` =  "персонаж" LIMIT 0, 12';
        } 
        else 
        {
            $query4 = 'SELECT  * FROM `servises` WHERE `type` =  "персонаж"';
        }
		
		$result4 = $link->query($query4); 
		while($row4 = $result4->fetch_array(MYSQLI_ASSOC))
		{
			 echo '<div class="col-12 col-md-6 col-lg-4 pers_cards">
						<img src="/admin/'.$row4["image"].'" alt="pers">
						<h2>'.$row4["name"].'</h2>
						<a href="/characters/'.$row4["cpu"].'/" class="btn btn-2"><span>Подробнее</span></a> 
					</div>';
		}
		
		?>
            


            
    </div>
        <?
        if($_GET["id"]!=='characters') {
            echo '
            <div class="row ">
                <div class="col-12 pers_call">
                    <a href="/characters/" class="button-5d">Открыть всех персонажей ->></a>
                </div>
            </div>';
        }
        ?>
    </div>
    