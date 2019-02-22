<?
include 'config.php'; //Подключение к базе данных

$name=htmlspecialchars($_POST["uname"]);
$tel=$_POST["utel"];
$review = htmlspecialchars($_POST["ureview"]);


$query1="INSERT INTO `reviews`(`name`, `telephone`, `text`) VALUES ('$name','$tel','$review')";
$result1=mysqli_query($link, $query1);
//Отправим сообщение о новом отзыве на телефон

mail("1A5E0077-DC28-6932-039C-9B22D3689EFF+79774718025@sms.ru","from:BarashkaMsk","New review");
mail("8D6BB3E3-0BC7-5679-C488-CC2F58CDE2F0+79774718015@sms.ru","from:BarashkaMsk","New review");

?>