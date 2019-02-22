<?
include 'config.php'; //Подключение к базе данных
if(isset($_POST["statu"]))
	{
		$status=$_POST["statu"];
		$id=$_POST["id"];
		$query1="UPDATE `reviews` SET `status`='$status' WHERE `id`='$id'";
		$result1=mysqli_query($link, $query1);
		//$result1->close();
		$query = 'SELECT * FROM `reviews`';
		
	}
?>