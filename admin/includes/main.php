<? 
// Запись новой старницы в БД
if($_GET["add_page"]==1)
{
    $tree = $_POST["tree"];
    $name = $_POST["name"];
    $cpu = $_POST["cpu"];
    $title = $_POST["title"];
    $ketwords = $_POST["keywords"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    
    $sql = "INSERT INTO `pages`( `tree`, `name`, `title`, `keywords`, `description`, `cpu`, `content`) 
    VALUES ( $tree, '$name', '$title', '$ketwords', '$description', '$cpu', '$content')";
    mysqli_query($link, $sql);
    $sql1= "SELECT MAX(id) FROM `pages`";
    $result = $link->query($sql1);
	$row = $result->fetch_array(MYSQLI_NUM);
	$id = $row[0];
	
	//надо добавить проверку, чтобы не записывались элементы 2 раза!!!
	
    if($_POST["Программы"]==1) {
        $sql2="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 1)";
        mysqli_query($link, $sql2);
    }
    if($_POST["Персонажи"]==1) {
        $sql3="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 2)";
        mysqli_query($link, $sql3);
    }
    if($_POST["Онлайн-калькулятор"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 3)";
         mysqli_query($link, $sql4);
    }
    if($_POST["Заказать звонок"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 4)";
         mysqli_query($link, $sql4);
    }
    if($_POST["Отзывы"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 5)";
         mysqli_query($link, $sql4);
    }
    if($_POST["Почему мы"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 9)";
         mysqli_query($link, $sql4);
    }
    
    $result->close();
   
}
// Удаление страницы
if(isset($_GET["del_page"])) {
    $id=$_GET["del_page"];
    $sql = "DELETE FROM `pages` WHERE `id`=$id";
    mysqli_query($link, $sql);
}

// Редактирование страницы
if(isset($_POST["edit_page"])) {
    $id=$_POST["edit_page"];
    $tree = $_POST["tree"];
    $name = $_POST["name"];
    $cpu = $_POST["cpu"];
    $title = $_POST["title"];
    $ketwords = $_POST["keywords"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    $sql = "UPDATE `pages` 
    SET `tree`= $tree, 
    `name`= '$name', 
    `title`= '$title',
    `keywords`= '$ketwords',
    `description`= '$description',
    `cpu`= '$cpu',
    `content`= '$content' 
    WHERE `id`=$id";
    mysqli_query($link, $sql);
    if($_POST["Программы"]==1) {
        $sql2="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 1)";
        mysqli_query($link, $sql2);
    }
    else
    {
         $sql2="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 1)";
          mysqli_query($link, $sql2);
    }
    if($_POST["Персонажи"]==1) {
        $sql3="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 2)";
         mysqli_query($link, $sql3);
    }
    else
    {
         $sql3="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 2)";
          mysqli_query($link, $sql3);
    }
    if($_POST["Онлайн-калькулятор"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 3)";
         mysqli_query($link, $sql4);
    }
    else
    {
         $sql4="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 3)";
          mysqli_query($link, $sql4);
    }
	if($_POST["Заказать звонок"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 4)";
         mysqli_query($link, $sql4);
    }
    else
    {
         $sql4="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 4)";
          mysqli_query($link, $sql4);
    }
	if($_POST["Отзывы"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 5)";
         mysqli_query($link, $sql4);
    }
    else
    {
         $sql4="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 5)";
          mysqli_query($link, $sql4);
    }
	if($_POST["Почему мы"]==1) {
        $sql4="INSERT INTO `relations`(`id_page`, `id_element`) VALUES ($id, 9)";
         mysqli_query($link, $sql4);
    }
    else
    {
         $sql4="DELETE FROM `relations` WHERE (`id_page` =$id AND `id_element` = 9)";
          mysqli_query($link, $sql4);
    }
    
    unset($_POST["edit_page"]);
    
}

?>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Страницы</h1>
          <button class="btn" data-toggle="collapse" data-target="#hide-me">+ Добавить страницу</button>
    		<div id="hide-me" class="collapse <? 
    		if(isset($_GET["edit_page"])) {
    		    echo ' in ';
    		} 
    		?>">
    		    
						    <?
						    if(isset($_GET["edit_page"]))
						    {
						        echo '<div class="panel panel-default">
                						<div class="panel-heading">Редактирование страницы</div>
                						<div class="panel-body">';
						        $id = $_GET["edit_page"];
						        
						        $query = "SELECT * FROM `pages` WHERE `id`= $id";
						        $result = $link->query($query);
						        $row = $result->fetch_array(MYSQLI_ASSOC);
						        echo '<form role="form" action="index.php" method="POST">
						        <div class="col-md-6">
									<div class="form-group">
									    <input hidden name="edit_page" value="'. $id.'">
										<label>Дерево</label>
										<select class="form-control" name="tree" >
											<option value="0" ';
											if($row["tree"]==0) { echo 'selected'; }
											echo ' >Корень</option>
											<option value="1">Нижнее меню</option>
											<option value="2">Статья</option>
										</select>
									</div>
									<div class="form-group">
										<label>Название страницы</label>
										<input class="form-control" name="name" value="'.$row["name"].'" required>
									</div>
															
									<div class="form-group">
										<label>ЧПУ</label>
										<input class="form-control" name="cpu" value="'.$row["cpu"].'">
										<p class="help-block">Вводить можно только латинкие символы в нижнем регистре без специальных знаков. Пример: admin</p>
									</div>
								
								</div>
									<div class="col-md-6">
									<div class="form-group">
										<label>title</label>
										<input class="form-control" name="title" value="'.$row["title"].'">
									</div>
									
									<div class="form-group">
										<label>keywords</label>
										<input class="form-control" name="keywords" value="'.$row["keywords"].'">
									</div>
									
									<div class="form-group">
										<label>description</label>
										<input class="form-control" name="description" value="'.$row["description"].'">
									</div>
								</div>';
								if($_GET["edit_page"]!=26) {
								
									echo '<div class="col-md-12">
									<div class="form-group">
										<label>Текст</label>
										<textarea class="form-control" name="content" id="editor1" rows="5" > '.$row["content"].'</textarea>
									</div>
									<div class="form-group">
										<label>Добавить шаблоны:</label>';
										
										//а здесь мы выводим из базы все дополнительные блоки, которые могут быть включены в страницу
										$query3 = "SELECT * FROM `elements`";
										$result3 = $link->query($query3);
										 
										 
						                while ($row3 = $result3->fetch_array(MYSQLI_ASSOC))
						                {
						                    echo '<div class="checkbox">
											<label>
												<input type="checkbox" name="'.$row3["name"].'" value="1" ';
												$query5 = "SELECT * FROM `relations` WHERE `id_page` = $id";
										        $result5 = $link->query($query5);
												while($row5 = $result5->fetch_array(MYSQLI_ASSOC)) {
												    if( $row5["id_element"]==$row3["id"]) 
												    {
												        echo ' checked '; 
												    }
												    
												}
												$result5->close();
												
												echo ' > '.$row3["name"].'
											</label>
											</div>';
						                }
						                $result3->close();
						            
						               
									echo '</div>';
								}
									echo '
									<button type="submit" class="btn btn-primary">Сохранить</button>
									<button type="reset" class="btn btn-default">Очистить</button>
								</div>
							</form>
								</div>
					</div>
    		        
    		    
    		        
    		</div>
								';
								
							 $result->close();
						        
						    }
						    else
						    {
							echo '  <!--форма добавления новой страницы страницы-->
							<div class="panel panel-default">
            						<div class="panel-heading">Добавление новой страницы</div>
            						<div class="panel-body">
							<form role="form" action="index.php?add_page=1" method="POST">
								<div class="col-md-6">
									<div class="form-group">
										<label>Дерево</label>
										<select class="form-control" name="tree">
											<option value="0">Корень</option>
											<option value="1">Нижнее меню</option>
											<option value="2">Статья</option>
										</select>
									</div>
									<div class="form-group">
										<label>Название страницы</label>
										<input class="form-control" name="name" required>
									</div>
															
									<div class="form-group">
										<label>ЧПУ</label>
										<input class="form-control" name="cpu">
										<p class="help-block">Вводить можно только латинкие символы в нижнем регистре без специальных знаков. Пример: admin</p>
									</div>
								
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>title</label>
										<input class="form-control" name="title">
									</div>
									
									<div class="form-group">
										<label>keywords</label>
										<input class="form-control" name="keywords">
									</div>
									
									<div class="form-group">
										<label>description</label>
										<input class="form-control" name="description">
									</div>
								</div>
								<div class="col-md-12">
								
									<div class="form-group">
										<label>Текст</label>
										<textarea class="form-control" name="content" id="editor1" rows="5"></textarea>
									</div>
									<div class="form-group">
										<label>Добавить шаблоны:</label>';
										
										
										//а здесь мы выводим из базы все дополнительные блоки, которые могут быть включены в страницу
										$query3 = "SELECT * FROM `elements`";
										 $result3 = $link->query($query3);
										 
										 
						                while ($row3 = $result3->fetch_array(MYSQLI_ASSOC))
						                {
						                    echo '<div class="checkbox">
											<label>
												<input type="checkbox" name="'.$row3["name"].'" value="1" > '.$row3["name"].'
											</label>
											</div>';
						                }
						                $result3->close();
						              echo '
									</div>
									<button type="submit" class="btn btn-primary">Сохранить</button>
									<button type="reset" class="btn btn-default">Очистить</button>
								</div>
							</form>
							<!--конец формы добавления новой страницы --> 
								</div>
					</div>
    		        
    		    
    		        
    		</div>
							';
						    }
							?>
					

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Вложенность</th>
                  <th>Название</th>
				  <th class="max-size">Title</th>
                  <th>Удалить/Изменить</th>
                </tr>
              </thead>
              <tbody>
			  <?
						$query4 = 'SELECT  * FROM `pages`';
						$result4 = $link->query($query4); 
						 while($row4 = $result4->fetch_array(MYSQLI_ASSOC))
						 {
						   echo '<tr>
						   <td>'.$row4["tree"].'</td>
						   <td><a href="index.php?edit_page='.$row4["id"].'">'.$row4["name"].'</a></td>
						   <td class="max-size">'.$row4["title"].'</td>
						   <td>
								<a href="index.php?edit_page='.$row4["id"].'"><i class="fas fa-pencil-alt"></i></a>
								<a href="index.php?del_page='.$row4["id"].'"><i class="fas fa-trash-alt"></i></a>
						   </td>
						   </tr>';
						 }
						 $result4->close();

					?>
                
              </tbody>
            </table>
          </div>
        </div>