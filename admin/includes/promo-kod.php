<?
if(isset($_POST["add"])) {
	$kod=$_POST["kod"];
	$percent=$_POST["percent"];
	$finish=$_POST["date"];
	$query1="INSERT INTO `promo-kod`(`kod`, `percent`, `finish`) VALUES ('$kod', $percent, '$finish')";
	$result1=mysqli_query($link, $query1);
	$result1->close();
	//unset($_POST["add"]);
}
?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Промо-коды</h1>
		  <div class="row">
			  <div class="col-md-12">
			  <button class="btn" data-toggle="collapse" data-target="#hide-form"> + Добавить промо-код</button>
			  <div id="hide-form" class="collapse">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Добавление промо кода</h2>
					</div>
					<div class="panel-body">
						<form action="index.php?page=promo-kod" method="POST" class="form">
							<div class="col-md-4">
								<div class="form-group">
									<label>Код</label>
									<input type="text" class="form-control" name="kod" id="kod" value="" required>
									<button type="button" class="btn btn-default form-control" onclick="Addkod()" id="kod_gen">Сгенерировать</button>
									<input name="add" hidden vaue="1">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Процент скидки</label>
									<input type="number" min="1" max="100" class="form-control" name="percent" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Работает до:</label>
									<input type="date"  class="form-control" name="date" required>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Сохранить</button>
							</div>
						</form>
					</div>
				</div>
			  </div>
	
			  </div>
			  
			  
		  </div>
		  <div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Код</th>
								<th>Процент скидки</th>
								<th>Действует до</th>
								<th>Статус</th>
							</tr>
						</th>
						<tbody>
						<?
						$query = 'SELECT * FROM `promo-kod`';
						$result = $link->query($query); 
						  while($kod = $result->fetch_array(MYSQLI_ASSOC))
						  {
							  echo '
							  <tr>
								<td>'.$kod["kod"].'</td>
								<td>'.$kod["percent"].' %</td>
								<td>'.$kod["finish"].'</td>
								<td>'.$kod["status"].'</td>
							  </tr>
							  ';
						  }
						?>
						</tbody>
			</div>
		  </div>
		  
		  </div>
     