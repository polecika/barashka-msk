<?

//если сделали отказ заказа
if(isset($_GET["otmena"])) {
	$id = $_GET["otmena"];
	$status = "Заказ отменен";
	$sql="UPDATE `orders` SET `status`='Заказ отменен' WHERE `id` ='$id'";
	mysqli_query($link, $sql);
}
//сохранения изменений по заказу
if(isset($_GET["edit_order"]))
{
	$id=$_GET["edit_order"];
	$adress=$_POST["region"].';'.$_POST["adress"];
	$order_date=$_POST["order_date"];
	$hours=$_POST["hours"];
	$pers=$_POST["pers"];
	if (is_array($_POST["prog"])) {
	
		foreach($_POST["prog"] as $prog) { 
			if($prog!="") {
				$programs.=$prog.';'; 
			}
		}
	}
	$price=$_POST["price"];
	$description=$_POST["description"];
	$sql="UPDATE `orders` SET `adress`='$adress',
	`order_date`='$order_date',
	`hours`='$hours',
	`pers`='$pers',
	`prog`='$programs',
	`price`='$price',
	`description`='$description',
	`status`='Назначается исполнитель' WHERE `id` ='$id'";
	mysqli_query($link, $sql);
}
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Заказы</h1>
		  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Дата</th>
                  <th>Имя</th>
				  <th>Номер</th>
                  <th>Статус</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  <?
                        $query = 'SELECT * FROM `orders` order by `call_date` DESC';
						$result = $link->query($query); 
						 while($order = $result->fetch_array(MYSQLI_ASSOC))
						 {
						     echo '
						     <form method="POST" action="index.php?page=orders&edit_order='.$order["id"].'">
                      
                    <tr ';
					if($order["status"]=="Заказ отменен") {
						echo 'style="background-color: #f1bbbb;"';
					}
					echo '>
                        <td>';
                        $datetime1 =  new DateTime(date("Y-m-d H:i:s"));
                        $datetime2 = new DateTime($order["call_date"]) ;
                        $interval = $datetime2->diff($datetime1);
                        if($interval->format( '%d') > 0) {
                            if($interval->format( '%m')>=1)
							{
								echo 'Больше месяца назад';
							}
							else
							{
								if($interval->format( '%d')==1)
								{
									echo $interval->format( '%d').' день';
								}
								elseif($interval->format( '%d')==2 || $interval->format( '%d')==3 || $interval->format( '%d')==4 
								|| $interval->format( '%d')==22 || $interval->format( '%d')==23 || $interval->format( '%d')==24)
								{
									echo $interval->format( '%d').' дня';
								}
								else
								{
									echo $interval->format( '%d').' дней';
								}
							}
							
                        }
                        else {
                            if($interval->format( '%H') > 0) 
                            {
                                if($interval->format( '%H')==1 || $interval->format( '%H')==21)
                                {
                                    echo $interval->format( ' %H час');
                                }
                                elseif($interval->format( '%H')==2 || $interval->format( '%H')==3 || $interval->format( '%H')==4 || $interval->format( '%H')==22
                                || $interval->format( '%H')==23)
                                {
                                    echo $interval->format( '%H часа');
                                }
                                else
                                {
                                    echo $interval->format( ' %H часов');
                                }
                            }
                            else
                            {
                                echo $interval->format( ' %I мин');
                            }
                        }
                        echo ' назад</td>
                        <td id="name'.$order["id"].'">'.$order["name"].'</td>
                        <td id="telephone'.$order["id"].'">'.$order["telephone"].'</td>
                        <td id="status'.$order["id"].'>
                            '.$order["status"].'<br>
                            <a href="index.php?page=orders&otmena='.$order["id"].'" class="btn btn-danger btn-block">Заказ отменен</a>
                        </td>
                        <td><buttonn class="btn btn-light" data-toggle="collapse" data-target="#hide-'.$order["id"].'">Подробнее</button></td>
                    </tr>
					<tr >';
					if($order["status"]!="Заказ отменен") {
						echo '
                        <td colspan="5">
                            <div id="hide-'.$order["id"].'" class="collapse">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Адрес:</label>';
										$adres = explode(";", $order["adress"]);
										echo '
                                        <input type="radio" name="region" value="Москва" class="form-check-input"';
										if($adres[0]=="Москва") 
										{
											echo ' checked ';
										}
										echo '>
                                        <label class="form-check-label">Москва</label>
                                        <input type="radio" name="region" value="МО" class="form-check-input"';
										if($adres[0]=="МО") 
										{
											echo ' checked ';
										}
										echo '>
                                        <label class="form-check-label">МО</label>
                                        <input type="text" name="adress" class="form-control" value="'.$adres[1].'">
                                    </div>
                                    <div class="form-group">
                                        <label>Дата и время заказа:</label>
                                        <input type="datetime-local" name="order_date" class="form-control" value="'.$order["order_date"].'">
                                    </div>
                                    <div class="form-group">
                                        <label>Персонаж:</label>
                                        <input type="text" class="form-control"  name="pers" id="pers" list="pers_list" value="'.$order["pers"].'">
                                        <datalist id="pers_list">';
                                            $query5 = 'SELECT  * FROM  `servises` WHERE  `type` =  "персонаж"';
											$result5 = $link->query($query5); 
											 while($pers = $result5->fetch_array(MYSQLI_ASSOC))
											 {
												echo '<option>'.$pers["name"].'</option>';
											 }
											 $result5->close();
                                        echo '</datalist>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Программа</label>
                                        <div class="form-check">
                                            <input type="checkbox" name="prog[]" value="Стандартная анимация" class="form-check-input" id="standart_anim">
                                            <label class="form-check-label">
                                                Стандартная анимация
                                            </label>
                                        </div>';
										$query4 = 'SELECT  * FROM  `servises` WHERE  `type` =  "программа"';
										$result4 = $link->query($query4); 
										$array_programs=explode(";",$order["prog"]);
										 while($program = $result4->fetch_array(MYSQLI_ASSOC))
										 {	
											
											 echo '
											<div class="form-check">
												<input type="checkbox" name="prog[]" value="'.$program["name"].'" class="form-check-input" ';
												foreach($array_programs as &$value) 
												{
													if($value==$program["name"])
													{
														echo ' checked ';
													}
												}
												echo ' >
												<label class="form-check-label">
													'.$program["name"].'
												</label>
											</div>';
										 }
										 $result4->close();
										echo '
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="other_prog">
                                            <label class="form-check-label">
                                                <input type="text" id="anknown_prog" name="prog[]" placeholder="Другое..." class="form-control" readonly>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Продолжительность анимации</label>
                                        <input type="number" name="hours" class="form-control" id="hour_anim" value="'.$order["hours"].'" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Комментарий:</label>
                                        <textarea class="form-control" name="description" rows="3">'.$order["description"].'</textarea>
                                    </div>
									<div class="form-group">
                                        <label>Промо-код:</label>
                                        <input class="form-control" name="promo-kod" id="promo-kod" list="kod_list" type="text" value="'.$order["promo-kod"].'" >
										<datalist id="kod_list">';
                                            $querykod = 'SELECT  * FROM  `promo-kod` ';
											$resultkod = $link->query($querykod); 
											 while($kod = $resultkod->fetch_array(MYSQLI_ASSOC))
											 {
												echo '<option>'.$kod["kod"].'</option>';
											 }
											 $result5->close();
                                        echo '</datalist>
									</div>
                                    <div class="form-group">
                                        <label>Цена:</label>
                                        <input class="form-control" name="price" type="text" value="'.$order["price"].'" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                        <button type="submit" class="btn btn-default" onclick="SendTo1C('.$order["id"].')">Сохранить и отправить в 1С</button>
                                    </div>
                                </div>
                            </div>
                        </td>
					';
					}
                    echo '
                   </tr> 
                </form>
						     ';
						 }
						 $result->close();
                      
                    ?>
                  
              </tbody>
            </table>
           </div>
		</div>
		