<?
function cropImage($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight) { 
if (($aNewImageWidth < 0) || ($aNewImageHeight < 0)) { 
return false; 
} 

// Массив с поддерживаемыми типами изображений 
$lAllowedExtensions = array(1 => "gif", 2 => "jpeg", 3 => "png"); 

// Получаем размеры и тип изображения в виде числа 
list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($aInitialImageFilePath); 

if (!array_key_exists($lImageExtensionId, $lAllowedExtensions)) { 
return false; 
} 
$lImageExtension = $lAllowedExtensions[$lImageExtensionId]; 

// Получаем название функции, соответствующую типу, для создания изображения 
$func = 'imagecreatefrom' . $lImageExtension; 
// Создаём дескриптор исходного изображения 
$lInitialImageDescriptor = $func($aInitialImageFilePath); 

// Определяем отображаемую область 
$lCroppedImageWidth = 0; 
$lCroppedImageHeight = 0; 
$lInitialImageCroppingX = 0; 
$lInitialImageCroppingY = 0; 
if ($aNewImageWidth / $aNewImageHeight > $lInitialImageWidth / $lInitialImageHeight) { 
$lCroppedImageWidth = floor($lInitialImageWidth); 
$lCroppedImageHeight = floor($lInitialImageWidth * $aNewImageHeight / $aNewImageWidth); 
$lInitialImageCroppingY = floor(($lInitialImageHeight - $lCroppedImageHeight) / 2); 
} else { 
$lCroppedImageWidth = floor($lInitialImageHeight * $aNewImageWidth / $aNewImageHeight); 
$lCroppedImageHeight = floor($lInitialImageHeight); 
$lInitialImageCroppingX = floor(($lInitialImageWidth - $lCroppedImageWidth) / 2); 
} 

// Создаём дескриптор для выходного изображения 
$lNewImageDescriptor = imagecreatetruecolor($aNewImageWidth, $aNewImageHeight); 
imagecopyresampled($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0, $lInitialImageCroppingX, $lInitialImageCroppingY, $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight); 
$func = 'image' . $lImageExtension; 

// сохраняем полученное изображение в указанный файл 
return $func($lNewImageDescriptor, $aNewImageFilePath); 
}
 

//Добавление программы/персонажа в БД
if($_GET["add_serv"]=="1" ) {
	$uploaddir = 'includes/images/';
	$error_flag = $_FILES["image"]["error"];
    //Проверка загружаемого изображения
	if($error_flag == 0)
	{
		if($_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
            //Перевод имени изображения с кириллицы на латиницу
            $name_lat=mb_strtolower($_POST['name'], 'utf-8');
            $name_lat = strtr($name_lat, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
			'е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m',
			'н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h',
			'ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya',
			'ъ'=>'','ь'=>''));
            $name_lat = str_replace(" ", "-", $name_lat);
			$uploadfile = $uploaddir.$name_lat;
            
			if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                
                cropImage($uploadfile, $uploadfile.'_barashka_msk', 300, 300);
                
				//Тут будут все переменные из формы
                $name = $_POST['name'];
                $cpu = $name_lat;
                $shot_description = $_POST['shot_description'];
                $full_description = $_POST['full_description'];
                $type = $_POST['type'];
                if($type=="программа") {
                    $price = $_POST['price'];
                }
                $age = $_POST['age1'].';'.$_POST['age2'];
                $sex = $_POST['sex'];
                if (is_array($_POST['event'])) {
                    foreach($_POST['event'] as $event) { $events.=$event.';'; }
                }
                $image = $uploadfile.'_barashka_msk';
                unlink($uploadfile);
                $title = $_POST['title'];
                $keywords = $_POST['keywords'];
                $description = $_POST['description'];
				$query="INSERT INTO `servises`( `name`, `cpu`, `title`, `keywords`, `description`, `shot_description`, `full_description`, `price`, `age`, `sex`, `event`, `image`, `type`) VALUES ('$name','$cpu','$title','$keywords','$description','$shot_description','$full_description','$price','$age','$sex','$events','$image','$type')";
				$result=mysqli_query($link, $query);
                //$result->close();
                
			}
			//header('Location: index.php?page=servises');
            
		}
		else
		{
			$error='Недопустимый формат изображения';
		}
	}
	else {
		$error='Изображение не загружено. Попробуйте ещё раз';
	}
}
// Удаление программы/персонажа
if(isset($_GET["del_serv"])) {
    $id=$_GET["del_serv"];
    $sql = "DELETE FROM `servises` WHERE `id`=$id";
    mysqli_query($link, $sql);
}
// Изменение программы
if(isset($_GET["edit_serv"])) {
    $id=$_GET["edit_serv"];
    //Перевод имени изображения с кириллицы на латиницу
    //$name_lat=mb_strtolower($_POST['name']);
    //$name_lat = strtr($name_lat, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    //$name_lat = str_replace(" ", "-", $name_lat);
    $name_lat = mb_strtolower($_POST['name'], 'utf-8');
	echo '1 трансформация: '.$name_lat;
	$name_lat = strtr($name_lat, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
	'е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m',
	'н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h',
	'ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya',
	'ъ'=>'','ь'=>''));
	echo '2 трансформация: '.$name_lat;
	$name_lat = str_replace(" ", "-", $name_lat);
	echo '3 трансформация: '.$name_lat;
	//Тут будут все переменные из формы
	if(isset($_FILES['image']['tmp_name'])) {
		$uploaddir = 'includes/images/';
		$error_flag = $_FILES["image"]["error"];
		
		if($error_flag == 0)
		{

				$uploadfile = $uploaddir.$name_lat;
				if(file_exists($uploadfile.'_barashka_msk')) { unlink($uploadfile.'_barashka_msk'); } // если такой файл уже закачан
				if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))
				{
				    
					cropImage($uploadfile, $uploadfile.'_barashka_msk', 300, 300);
					$image = $uploadfile.'_barashka_msk';
					unlink($uploadfile);
					
				}
		}
	}
	
	
    $name = $_POST['name'];
    $cpu = $name_lat;
    $shot_description = $_POST['shot_description'];
    $full_description = $_POST['full_description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $age = $_POST['age1'].';'.$_POST['age2'];
    $sex = $_POST['sex'];
    if (is_array($_POST['event'])) {
        foreach($_POST['event'] as $event) { $events.=$event.';'; }
    }
    $title = $_POST['title'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
	if($image!="") {
		$queryUpdate="UPDATE `servises` SET `name`= '$name',`cpu`='$cpu', `image`='$image',`title`='$title',`keywords`='$title',`description`='$description',`shot_description`='$shot_description',`full_description`='$full_description',`price`='$price',`age`='$age',`sex`='$sex',`event`='$events', `type`='$type' where `id`='$id'";
	}
	else
	{
		$queryUpdate="UPDATE `servises` SET `name`= '$name',`cpu`='$cpu', `title`='$title',`keywords`='$title',`description`='$description',`shot_description`='$shot_description',`full_description`='$full_description',`price`='$price',`age`='$age',`sex`='$sex',`event`='$events', `type`='$type' where `id`='$id'";
	}
	
	$resultUpdate=mysqli_query($link, $queryUpdate);
}


?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Программы/Персонажи</h1>
		
		<div class="row">
		    <h2>Список программ </h2>
		</div>
        <? 
        if(isset($_GET["edit_prog"])) {
            $id = $_GET["edit_prog"];
            $query = "SELECT * FROM `servises` WHERE `id`= $id";
            $result = $link->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
        }
        ?>
		<div class="row">
		        
		    <button class="btn" data-toggle="collapse" data-target="#hide-prog"> + Добавить прорамму</button>
		    <div id="hide-prog" class="collapse 
            <? 
               if(isset($_GET["edit_prog"])) {
                   echo ' in ';
               }    
            ?>
            ">
                <!--форма добавления новой программы-->
							<div class="panel panel-default">
            					<div class="panel-heading">Добавление программы</div>
            						<div class="panel-body">
            							<form role="form" enctype="multipart/form-data" action="index.php?page=servises&<?
            							    if(isset($_GET["edit_prog"])) 
            							    { 
            							        echo  'edit_serv='.$_GET["edit_prog"];
            							        
            							    }
            							    else 
            							    {
            							        echo 'add_serv=1';
            							    }
            							    
            						
                                         ?> " method="POST">
            								<div class="col-md-6">
            									<div class="form-group">
            										<label>Название программы</label>
            										<input class="form-control" name="name" required
                                                       <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo ' value="'.$row["name"].'"';
                                                       }
                                                       echo '>';
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo '<input hidden name="edit_prog" value="'.$_GET["edit_prog"].'">';
                                                       }
                                                       ?>
                                                    
                                                    <input type="hidden" name="type" value="программа">
            									</div>
            															
            									<div class="form-group">
            										<label>title</label>
            										<input class="form-control" name="title" required
                                                    <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo ' value="'.$row["title"].'"';
                                                       }
                                                    ?>
                                                    >
            									</div>
            									
            									<div class="form-group">
            										<label>keywords</label>
            										<input class="form-control" name="keywords"
                                                    <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo ' value="'.$row["keywords"].'"';
                                                       }
                                                    ?>
                                                    >
            									</div>
            									
            									<div class="form-group">
            										<label>description</label>
            										<input class="form-control" name="description"
													 <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo ' value="'.$row["description"].'"';
                                                       }
                                                    ?>
													>  
            									</div>
                                                
                                                
                                                
                                                <div class="form-row">
            										<label>Возраст детей</label>
                                                    <div class="form-group cal-md-6">
                                                        <p>От<input class="form-control" name="age1"
                                                        <? 
                                                           if(isset($_GET["edit_prog"])) {
                                                               $age = explode(";", $row["age"]);
                                                               echo ' value="'.$age[0].'"';
                                                           }
                                                        ?>           
                                                        ></p>
                                                    </div>
                                                    <div class="form-group cal-md-6">
                                                        <p>До<input class="form-control" name="age2"
                                                         <? 
                                                           if(isset($_GET["edit_prog"])) {
                                                               $age = explode(";", $row["age"]);
                                                               echo ' value="'.$age[1].'"';
                                                           }
                                                        ?>            
                                                        ></p>
                                                    </div>
            
            									</div>
            								
            								</div>
            								<div class="col-md-6">
            									
                                                
                                                <div class="form-group">
            										<label>Цена</label>
                                                    <input class="form-control" name="price"
                                                    <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo ' value="'.$row["price"].'"';
                                                       }
                                                    ?>        
                                                    > 
            									</div>
                                                
                                               
                                                <div class="form-group">
            										<label>Пол:</label>
            										<select class="form-control" name="sex">
            											<option value="Для девочек"
                                                        <? 
                                                           if(isset($_GET["edit_prog"])) {
                                                               if($row["sex"]=="Для девочек")
                                                               echo ' selected ';
                                                           }
                                                        ?>       
                                                        >Для девочек</option>
            											<option value="Для мальчиков"
                                                        <? 
                                                           if(isset($_GET["edit_prog"])) {
                                                               if($row["sex"]=="Для мальчиков")
                                                               echo ' selected ';
                                                           }
                                                        ?>        
                                                        >Для мальчиков</option>
            											<option value="Для девочек и мальчиков"
                                                        <? 
                                                           if(isset($_GET["edit_prog"])) {
                                                               if($row["sex"]=="Для девочек и мальчиков")
                                                               echo ' selected ';
                                                           }
                                                        ?>        
                                                        >Для девочек и мальчиков</option>
            										</select>
            									</div>
                                                
                                                <div class="custom-file" >
                                                    <label>Фото:</label>
                                                    <?
                                                    if(isset($_GET["edit_prog"])) {
                                                        echo '<input type="image" id="divFile" name="image" width="100px" src="'.$row["image"].'">
														<a class="btn" id="changeButton" onclick="changeImg()">Изменить фото</a>';
                                                    }
                                                    else {
                                                        echo '<input type="file" id="file" required class="custom-file-input" multiple accept="image/*,image/jpeg" name="image">';
                                                    }
                                                    ?>
                                                    
												<!--<small  class="form-text text-muted">Картинка должна быть не более 200*200</small> -->
                                                </div>
                                                
                                                <div class="form-row">
            										<label align="center">На какой празник:</label>
            									
                                                        <div class="form-group">
                                                            <?
                                                            $q = 'SELECT * FROM `events`';
                                    						$r = $link->query($q); 
                                    						while($event = $r->fetch_array(MYSQLI_ASSOC))
                                    						 {
                                                                echo '<p><input type="checkbox" class="form-check-input"  name="event['.$event["key"].']" value="'.$event["name"].'"';
                                                                if(isset($_GET["edit_prog"])){
                                                                    $array_event=explode(";",$row["event"]);
                                                                    foreach ($array_event as &$value) {
                                                                        if($value==$event["name"]) {
                                                                            echo ' checked ';
                                                                        }
                                                                    }
                                                                }
                                                                echo '> '.$event["name"].'</p>';
                                    						 }
                                    						 $r->close();
                                                            ?>
                                                        </div>
            									</div>
                                                
            								</div>
            								<div class="col-md-12">
                                                
                                                 
                                                
            								
                                                <div class="form-group">
            										<label>Короткое описание:</label>
            										<textarea class="form-control" name="shot_description" rows="3">
                                                    <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo $row["shot_description"];
                                                       }
                                                    ?>
                                                    </textarea>
            									</div>
            									<div class="form-group">
            										<label>Полное описание:</label>
            										<textarea class="form-control" name="full_description" id="editor1" rows="5">
                                                    <? 
                                                       if(isset($_GET["edit_prog"])) {
                                                           echo $row["full_description"];
                                                       }
                                                    ?>
                                                    </textarea>
            									</div>
            								
                								<button type="submit" class="btn btn-primary">Сохранить</button>
                								<button type="reset" class="btn btn-default">Очистить</button>
            								</div>
            							</form>
							        <!--конец формы добавления новой страницы --> 
								</div>
					</div>
    		        
		    </div>
            </div>
           
		    <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Фото</th>
                          <th>Название программы</th>
                          <th>Удалить/Изменить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $query4 = 'SELECT  * FROM  `servises` WHERE  `type` =  "программа"';
						$result4 = $link->query($query4); 
						 while($prog = $result4->fetch_array(MYSQLI_ASSOC))
						 {
						   echo '<tr>
						   <td><img src="'.$prog["image"].'" width="100px"></td>
						   <td><a href="index.php?page=servises&edit_prog='.$prog["id"].'">'.$prog["name"].'</a></td>
						   <td>
								<a href="index.php?page=servises&edit_prog='.$prog["id"].'"><i class="fas fa-pencil-alt"></i></a>
								<a href="index.php?page=servises&del_serv='.$prog["id"].'"><i class="fas fa-trash-alt"></i></a>
						   </td>
						   </tr>';
						 }
						 $result4->close();
						
					    ?>
                    </tbody>
                </table>
		    </div>
		<div class="row">
		    <h2>Список персонажей</h2>
		</div>
		<? 
        if(isset($_GET["edit_pers"])) {
            $id = $_GET["edit_pers"];
            $query = "SELECT * FROM `servises` WHERE `id`= $id";
            $result = $link->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
        }
        ?>
		<div class="row">
		    <button class="btn" data-toggle="collapse" data-target="#hide-pers"> + Добавить персонажа</button>
		    <div id="hide-pers" class="collapse 
		    <? 
               if(isset($_GET["edit_pers"])) {
                   echo ' in ';
            }    
            ?>
		    ">
		        <!--форма добавления нового персонажа-->
							<div class="panel panel-default">
            					<div class="panel-heading">Добавление персонажа</div>
            						<div class="panel-body">
            							<form role="form" enctype="multipart/form-data" action="index.php?page=servises&<?
            							    if(isset($_GET["edit_pers"])) 
            							    { 
            							        echo  'edit_serv='.$_GET["edit_pers"];
            							        
            							    }
            							    else 
            							    {
            							        echo 'add_serv=1'; 
            							    }
            							    
            						
                                         ?>" method="POST">
            								<div class="col-md-6">
            									<div class="form-group">
            										<label>Название персонажа</label>
            										<input class="form-control" name="name" required
            										<? 
                                                       if(isset($_GET["edit_pers"])) {
                                                           echo ' value="'.$row["name"].'"';
                                                       }
                                                       echo '>';
                                                       if(isset($_GET["edit_pers"])) {
                                                           echo '<input hidden name="edit_pers" value="'.$_GET["edit_pers"].'">';
                                                       }
                                                     ?>
            										
                                                    <input type="hidden" name="type" value="персонаж">
            									</div>
            															
            									<div class="form-group">
            										<label>title</label>
            										<input class="form-control" name="title" required
            										<? 
                                                       if(isset($_GET["edit_pers"])) {
                                                           echo ' value="'.$row["title"].'"';
                                                       }
                                                    ?>
            										>
            									</div>
            									
            									<div class="form-group">
            										<label>keywords</label>
            										<input class="form-control" name="keywords"
            										<? 
                                                       if(isset($_GET["edit_pers"])) {
                                                           echo ' value="'.$row["keywords"].'"';
                                                       }
                                                    ?>
            										>
            									</div>
            									
            									<div class="form-group">
            										<label>description</label>
            										<input class="form-control" name="description"
            										<? 
                                                       if(isset($_GET["edit_pers"])) {
                                                           echo ' value="'.$row["description"].'"';
                                                       }
                                                    ?>
            										>
            									</div>
                                                
                                                
                                                
                                                <div class="form-row">
            										<label>Возраст детей</label>
                                                    <div class="form-group cal-md-6">
                                                        <p>От<input class="form-control" name="age1"
                                                        <? 
                                                           if(isset($_GET["edit_pers"])) {
                                                                $age = explode(";", $row["age"]);
                                                                echo ' value="'.$age[0].'"';
                                                           }
                                                        ?>  
                                                        ></p>
                                                    </div>
                                                    <div class="form-group cal-md-6">
                                                        <p>До<input class="form-control" name="age2"
                                                        <? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               $age = explode(";", $row["age"]);
                                                               echo ' value="'.$age[1].'"';
                                                           }
                                                        ?>  
                                                        ></p>
                                                    </div>
            
            									</div>
            								
            								</div>
            								<div class="col-md-6">
            									
                                                

                                                
                                               
                                                <div class="form-group">
            										<label>Пол:</label>
            										<select class="form-control" name="sex">
            											<option value="Для девочек" 
            											<? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               if($row["sex"]=="Для девочек")
                                                               echo ' selected ';
                                                           }
                                                        ?>  
            											>Для девочек</option>
            											<option value="Для мальчиков" 
            											<? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               if($row["sex"]=="Для мальчиков")
                                                               echo ' selected ';
                                                           }
                                                        ?> 
            											>Для мальчиков</option>
            											<option value="Для девочек и мальчиков" 
            											<? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               if($row["sex"]=="Для девочек и мальчиков")
                                                               echo ' selected ';
                                                           }
                                                        ?> 
            											>Для девочек и мальчиков</option>
            										</select>
            									</div>
                                                
                                                <div class="custom-file">
                                                    <label>Фото:</label>
                                                    <?
                                                    if(isset($_GET["edit_pers"])) {
                                                        echo '<input type="image" id="divFile1" name="image" width="100px" src="'.$row["image"].'">
														<a class="btn" id="changeButton1" onclick="changeImg1()">Изменить фото</a>';
                                                    }
                                                    else {
                                                        echo '<input type="file" id="file" required class="custom-file-input" multiple accept="image/*,image/jpeg" name="image">';
                                                    }
                                                    ?>
                                                    <!--<small  class="form-text text-muted">Картинка должна быть не более 200*200</small> -->
                                                </div>
                                                
                                                <div class="form-row">
            										<label align="center">На какой празник:</label>
                                                        <div class="form-group">
                                                            <?
                                                            $q = 'SELECT * FROM `events`';
                                    						$r = $link->query($q); 
                                    						while($event = $r->fetch_array(MYSQLI_ASSOC))
                                    						 {
                                                                echo '<p><input type="checkbox" class="form-check-input"  name="event['.$event["key"].']" value="'.$event["name"].'"';
                                                                if(isset($_GET["edit_pers"])){
                                                                    $array_event=explode(";",$row["event"]);
                                                                    foreach ($array_event as &$value) {
                                                                        if($value==$event["name"]) {
                                                                            echo ' checked ';
                                                                        }
                                                                    }
                                                                }
                                                                echo '> '.$event["name"].'</p>';
                                    						}
                                    						 $r->close();
                                                            ?>
                                                        </div>
            									</div>
                                                
            								</div>
            								<div class="col-md-12">
                                                
                                                 
                                                
            								
                                                <div class="form-group">
            										<label>Короткое описание:</label>
            										<textarea class="form-control" name="shot_description" rows="3">
            										    <? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               echo $row["shot_description"];
                                                           }
                                                        ?>
            										    
            										</textarea>
            									</div>
            									<div class="form-group">
            										<label>Полное описание:</label>
            										<textarea class="form-control" name="full_description" id="editor2" rows="5">
            										    <? 
                                                           if(isset($_GET["edit_pers"])) {
                                                               echo $row["full_description"];
                                                           }
                                                        ?>
            										</textarea>
            										
            									</div>
            								
                								<button type="submit" class="btn btn-primary">Сохранить</button>
                								<button type="reset" class="btn btn-default">Очистить</button>
            								</div>
            							</form>
							        <!--конец формы добавления новой страницы --> 
								</div>
					</div>
    		        
		    </div>
            </div>
		    <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Фото</th>
                          <th>Название Персонажа</th>
                          <th>Удалить/Изменить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $query5 = 'SELECT  * FROM  `servises` WHERE  `type` =  "персонаж"';
						$result5 = $link->query($query5); 
						 while($pers = $result5->fetch_array(MYSQLI_ASSOC))
						 {
						   echo '<tr>
						   <td><img src="'.$pers["image"].'" width="100px"></td>
						   <td><a href="index.php?page=servises&edit_pers='.$pers["id"].'">'.$pers["name"].'</a></td>
						   <td>
								<a href="index.php?page=servises&edit_pers='.$pers["id"].'"><i class="fas fa-pencil-alt"></i></a>
								<a href="index.php?page=servises&del_serv='.$pers["id"].'"><i class="fas fa-trash-alt"></i></a>
						   </td>
						   </tr>';
						 }
						 $result5->close();

					    ?>
                    </tbody>
                </table>
		    </div>
		</div>
</div>
		