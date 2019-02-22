<?
	//include 'includes/ajax.php';
	echo '
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Отзывы</h1>
		  <div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Имя</th>
								<th>Телефон</th>
								<th>Отзыв</th>
								<th></th>
							</tr>
						</th>
						<tbody>';
							
						$query = 'SELECT * FROM `reviews`';
						$result = $link->query($query); 
						  while($re = $result->fetch_array(MYSQLI_ASSOC))
						  {
							  echo '
							  <tr>
								<td>'.$re["name"].'</td>
								<td>'.$re["telephone"].'</td>
								<td>'.$re["text"].'</td>
								<td>';
									echo '<button class="btn ';
									if($re["status"]==1)
									{
										echo ' btn-primary ';
									}
									else
									{
										echo 'btn-success';
									}
									echo ' form-control" id="CV'.$re["id"].'" onclick="changeVisible('.$re["status"].','.$re["id"].' )">';
									if($re["status"]==1)
									{
										echo 'Показывать на сайте';
									}
									else
									{
										echo 'Не показывать на сайте';
									}
									
									echo '</button>';
								
								echo '</td>
							  </tr>
							  ';
						  }
						
						echo '</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>';
      ?>