<?
//Функция добавления статьи
if(isset($_POST["add"])) {
	$name=$_POST["name"];
	$date=$_POST["date"];
	$title=$_POST["title"];
	$keywords=$_POST["keywords"];
	$description=$_POST["description"];
	$text=$_POST["text"];
	//Перевод имени с кириллицы на латиницу
		$name_lat=mb_strtolower($_POST['name'], 'utf-8');
		$name_lat = strtr($name_lat, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		$name_lat = str_replace(" ", "-", $name_lat);
	$cpu=$name_lat;
	$query1="INSERT INTO `news`( `name`, `data`, `cpu`, `title`, `keywords`, `description`,  `text`) VALUES ('$name', '$date','$cpu','$title','$keywords','$description','$text')";
	$result1=mysqli_query($link, $query1);
	//$result1->close();
	unset($_POST["add"]);
}

//Функция изменения статьи
if(isset($_GET["edited_new"]))
{
	$id=$_GET["edited_new"];
	$name=$_POST["name"];
	$date=$_POST["date"];
	$title=$_POST["title"];
	$keywords=$_POST["keywords"];
	$description=$_POST["description"];
	$text=$_POST["text"];
	//Перевод имени с кириллицы на латиницу
		$name_lat=mb_strtolower($_POST['name'], 'utf-8');
		$name_lat = strtr($name_lat, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		$name_lat = str_replace(" ", "-", $name_lat);
	$cpu=$name_lat;
	$query1="UPDATE `news` SET `name`='$name',`title`='$title',`keywords`='$keywords',`description`='$description',`cpu`='$cpu',`data`='$date',`text`='$text' WHERE `id`='$id'";
	$result1=mysqli_query($link, $query1);
}

//Функция удаления статьи
if(isset($_GET["del_new"])) {
	$id=$_GET["del_new"];
    $sql = "DELETE FROM `news` WHERE `id`=$id";
    mysqli_query($link, $sql);
}
//Функция вывода изменяемой статьи
if(isset($_GET["edit_new"]))
{
	$id=$_GET["edit_new"];
	$query1="SELECT * FROM `news` WHERE `id`= '$id'";
	$result1 = $link->query($query1);
    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
}


?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Статьи</h1>
	<div class="row">
		<button class="btn" data-toggle="collapse" data-target="#hide-form"> + Добавить статью</button>
		<div id="hide-form" class="collapse 
		<?
			if(isset($_GET["edit_new"])) {
				echo ' in ';
			}
		?>
		">
			<!--форма добавления новой статьи-->
			<div class="panel panel-default">
				<div class="panel-heading">
				<?
					if(isset($_GET["edit_new"])) {
						echo 'Изменение статьи';
					}
					else {
						echo 'Добавление статьи';
					}
				?>
				</div>
				<div class="panel-body">
					<form action="index.php?page=articles<?
						if(isset($_GET["edit_new"])) 
						{
							echo '&edited_new='.$_GET["edit_new"];
						}
					?>" method="POST" class="form">
					<div class="col-md-6">
						<div class="form-group">
							<label>Название статьи</label>
							<input type="text" class="form-control" name="name" 
							value="<?
								if(isset($_GET["edit_new"])) {
									echo $row1["name"].'" required>';
								}
								else
								{
									echo '" required>
									<input name="add" hidden vaue="1">';
								}
							
							?>
						</div>
						<div class="form-group">
							<label>Дата:</label>
							<input type="date" class="form-control" name="date" value="<?
								if(isset($_GET["edit_new"])) {
									echo $row1["data"];
								}
							?>">
						</div>
						
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Title</label>
							<input type="" class="form-control" name="title" value="<?
								if(isset($_GET["edit_new"])) {
									echo $row1["title"];
								}
							?>" equired>
						</div>
						<div class="form-group">
							<label>Keywords</label>
							<input type="" class="form-control" value="<?
								if(isset($_GET["edit_new"])) {
									echo $row1["keywords"];
								}
							?>" name="keywords">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label>Description</label>
							<input type="" class="form-control" value="<?
								if(isset($_GET["edit_new"])) {
									echo $row1["description"];
								}
							?>" name="description">
						</div>
						<div class="form-group">
							<label>Статья</label>
							<textarea id="editor1" class="form-control" name="text"><?
								if(isset($_GET["edit_new"])) {
									echo $row1["text"];
								}
							?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Сохранить</button>
                			<button type="reset" class="btn btn-default">Очистить</button>
						</div>
					</div>
					
					</form>
				</div>
			</div>
		</div>
			
	</div>
	<div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Дата</th>
                          <th>Название статьи</th>
                          <th>Удалить/Изменить</th>
                        </tr>
                    </thead>
                    <tbody>
						
						<?
                        $query = 'SELECT * FROM `news`';
						$result = $link->query($query); 
						  while($new = $result->fetch_array(MYSQLI_ASSOC))
						  {
							  echo '<tr>
							  <td>'.$new["data"].'</td>
							  <td>'.$new["name"].'</td>
							  <td>
							 <a href="index.php?page=articles&edit_new='.$new["id"].'"><i class="fas fa-pencil-alt"></i></a>
							 <a href="index.php?page=articles&del_new='.$new["id"].'"><i class="fas fa-trash-alt"></i></a>
							 </td>
							 </tr>';
						  }
						 $result->close();
						 ?>
						
					</tbody>
				</table>
	</div>
</div>
     